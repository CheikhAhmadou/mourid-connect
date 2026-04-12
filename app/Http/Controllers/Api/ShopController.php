<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\StoreShopRequest;
use App\Http\Requests\Shop\UpdateShopRequest;
use App\Http\Resources\ShopResource;
use App\Models\Shop;
use App\Services\ImageService;
use Cocur\Slugify\Slugify;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ShopController extends Controller
{
    public function __construct(private ImageService $imageService) {}

    public function index(): AnonymousResourceCollection
    {
        $shops = Shop::active()
            ->with('user')
            ->withCount('activeProducts')
            ->latest()
            ->paginate(20);

        return ShopResource::collection($shops);
    }

    public function store(StoreShopRequest $request): JsonResponse
    {
        $data         = $request->validated();
        $data['user_id'] = $request->user()->id;
        $data['slug'] = (new Slugify())->slugify($data['name']);

        if ($request->hasFile('logo')) {
            $data['logo'] = $this->imageService->store($request->file('logo'), 'shops/logos');
        }

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $this->imageService->store($request->file('cover_image'), 'shops/covers', 1920);
        }

        $shop = Shop::create($data);

        return response()->json(new ShopResource($shop->load('user')), 201);
    }

    public function show(Shop $shop): ShopResource
    {
        $shop->incrementViews();
        $shop->load(['user', 'activeProducts.mainImage', 'activeProducts.category']);

        return new ShopResource($shop);
    }

    public function update(UpdateShopRequest $request, Shop $shop): ShopResource
    {
        $this->authorize('update', $shop);

        $data = $request->validated();

        if ($request->hasFile('logo')) {
            if ($shop->logo) {
                $this->imageService->delete($shop->logo);
            }
            $data['logo'] = $this->imageService->store($request->file('logo'), 'shops/logos');
        }

        if ($request->hasFile('cover_image')) {
            if ($shop->cover_image) {
                $this->imageService->delete($shop->cover_image);
            }
            $data['cover_image'] = $this->imageService->store($request->file('cover_image'), 'shops/covers', 1920);
        }

        $shop->update($data);

        return new ShopResource($shop->load('user'));
    }

    public function verify(Shop $shop): ShopResource
    {
        $shop->update(['is_verified' => ! $shop->is_verified]);

        return new ShopResource($shop->load('user'));
    }

    public function destroy(Shop $shop): JsonResponse
    {
        $this->authorize('delete', $shop);

        if ($shop->logo) {
            $this->imageService->delete($shop->logo);
        }
        if ($shop->cover_image) {
            $this->imageService->delete($shop->cover_image);
        }

        $shop->delete();

        return response()->json(['message' => 'Boutique supprimée.']);
    }
}
