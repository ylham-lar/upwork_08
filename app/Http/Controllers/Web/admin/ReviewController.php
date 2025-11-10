<?php

namespace App\Http\Controllers\Web\admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'client_id' => ['nullable', 'integer', 'min:1'],
            'freelancer_id' => ['nullable', 'integer', 'min:1'],
            'review_id' => ['nullable', 'integer', 'min:1'],
        ]);

        $filter_client = $request->has('client_id') ? $request->client_id : null;
        $filter_freelancer = $request->has('freelancer_id') ? $request->freelancer_id : null;
        $filter_review = $request->has('review_id') ? $request->review_id : null;

        $reviews = Review::when(isset($filter_client), fn ($query) => $query->where('client_id', $filter_client))
            ->when(isset($filter_freelancer), fn ($query) => $query->where('freelancer_id', $filter_freelancer))
            ->when(isset($filter_review), fn ($query) => $query->where('id', $filter_review))
            ->orderBy('id')
            ->get();

        return view('admin.review.index')->with([
            'reviews' => $reviews,
        ]);
    }
}
