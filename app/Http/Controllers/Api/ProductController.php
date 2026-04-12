<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Shop;
use App\Services\ImageService;
use Cocur\Slugify\Slugify;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    public function __construct(private ImageService $imageService) {}

    public function index(Request $request): AnonymousResourceCollection
    {
        $query = Product::active()
            ->with(['shop', 'category', 'mainImage'])
            ->when($request->category, fn ($q, $cat) => $q->where('category_id', $cat))
            ->when($request->shop, fn ($q, $shop) => $q->where('shop_id', $shop))
            ->when($request->search, fn ($q, $s) => $q->where('name', 'like', "%{$s}%"))
            ->when($request->featured, fn ($q) => $q->featured());

        return ProductResource::collection($query->latest()->paginate(24));
    }

    public function store(StoreProductRequest $request): JsonResponse
    {
        $shop = Shop::findOrFail($request->shop_id);

        if (! $shop->canAddProduct()) {
            return response()->json([
                'message' => 'Limite de produits atteinte pour votre abonnement.',
            ], 403);
        }

        $data         = $request->validated();
        $data['slug'] = (new Slugify())->slugify($data['name']).'-'.uniqid();

        $product = Product::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $file) {
                $url     = $this->imageService->store($file, 'products');
                $thumb   = $this->imageService->storeThumbnail($file, 'products');
                ProductImage::create([
                    'product_id'    => $product->id,
                    'url'           => $url,
                    'url_thumbnail' => $thumb,
                    'is_main'       => $index === 0,
                    'order'         => $index,
                ]);
            }
        }

        return response()->json(
            new ProductResource($product->load(['shop', 'category', 'images'])),
            201
        );
    }

    public function show(Product $product): ProductResource
    {
        $product->incrementViews();
        $product->load(['shop.user', 'category', 'images', 'reviews.user']);

        return new ProductResource($product);
    }

    public function update(UpdateProductRequest $request, Product $product): ProductResource
    {
        $this->authorize('update', $product);

        $data = $request->validated();
        $product->update($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $file) {
                $url   = $this->imageService->store($file, 'products');
                $thumb = $this->imageService->storeThumbnail($file, 'products');
                ProductImage::create([
                    'product_id'    => $product->id,
                    'url'           => $url,
                    'url_thumbnail' => $thumb,
                    'is_main'       => false,
                    'order'         => $product->images()->max('order') + $index + 1,
                ]);
            }
        }

        return new ProductResource($product->load(['shop', 'category', 'images']));
    }

    public function destroy(Product $product): JsonResponse
    {
        $this->authorize('delete', $product);

        foreach ($product->images as $image) {
            $this->imageService->delete($image->url);
            if ($image->url_thumbnail) {
                $this->imageService->delete($image->url_thumbnail);
            }
        }

        $product->delete();

        return response()->json(['message' => 'Produit supprimé.']);
    }
}
