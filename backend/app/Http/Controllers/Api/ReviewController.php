<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\StoreReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ReviewController extends Controller
{
    public function index(Product $product): AnonymousResourceCollection
    {
        $reviews = $product->reviews()->with('user')->latest()->paginate(15);

        return ReviewResource::collection($reviews);
    }

    public function store(StoreReviewRequest $request, Product $product): JsonResponse
    {
        $existing = Review::where('product_id', $product->id)
            ->where('user_id', $request->user()->id)
            ->exists();

        if ($existing) {
            return response()->json(['message' => 'Vous avez déjà laissé un avis sur ce produit.'], 422);
        }

        $review = Review::create([
            'product_id' => $product->id,
            'user_id'    => $request->user()->id,
            'rating'     => $request->rating,
            'comment'    => $request->comment,
        ]);

        return response()->json(new ReviewResource($review->load('user')), 201);
    }

    public function destroy(Review $review): JsonResponse
    {
        if ($review->user_id !== request()->user()->id) {
            return response()->json(['message' => 'Non autorisé.'], 403);
        }

        $review->delete();

        return response()->json(['message' => 'Avis supprimé.']);
    }
}
