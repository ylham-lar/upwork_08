<?php

namespace App\Http\Controllers\Web\admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::orderBy('id')
            ->get();

        return view('admin.review.index')->with([
            'reviews' => $reviews,
        ]);
    }
}
