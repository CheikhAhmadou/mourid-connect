<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ShopResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class VendorController extends Controller
{
    public function shops(Request $request): AnonymousResourceCollection
    {
        $shops = $request->user()
            ->shops()
            ->withCount('products')
            ->latest()
            ->get();

        return ShopResource::collection($shops);
    }

    public function products(Request $request): AnonymousResourceCollection
    {
        $shopIds = $request->user()->shops()->pluck('id');

        $products = \App\Models\Product::whereIn('shop_id', $shopIds)
            ->with(['shop', 'category', 'mainImage'])
            ->latest()
            ->paginate(20);

        return ProductResource::collection($products);
    }

    public function stats(Request $request): JsonResponse
    {
        $user  = $request->user();
        $shops = $user->shops()->withCount(['products', 'activeProducts'])->get();

        $totalViews    = $shops->sum('views_count');
        $totalContacts = $shops->sum('contacts_count');
        $totalProducts = $shops->sum('products_count');

        return response()->json([
            'shops_count'    => $shops->count(),
            'products_count' => $totalProducts,
            'views_count'    => $totalViews,
            'contacts_count' => $totalContacts,
            'shops'          => ShopResource::collection($shops),
        ]);
    }
}
