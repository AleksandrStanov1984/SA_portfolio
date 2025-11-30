<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
public function store(Request $request, string $locale)
{
    if (!$request->ajax()) {
        return response()->json(['success' => false, 'message' => 'Not AJAX'], 400);
    }

    app()->setLocale($locale);

    $data = $request->validate([
        'name'    => ['nullable', 'string', 'max:80'],
        'rating'  => ['required', 'integer', 'min:1', 'max:5'],
        'comment' => ['required', 'string', 'max:250'],
    ]);

    $sanitize = static function (?string $v): ?string {
        if ($v === null) return null;
        $v = strip_tags($v);
        $v = preg_replace('/[\x00-\x1F\x7F\x{2028}\x{2029}]/u', ' ', $v);
        $v = preg_replace('/\s+/u', ' ', $v);
        return trim($v) ?: null;
    };

    $review = Review::create([
        'name' => $sanitize($data['name']),
        'rating' => $data['rating'],
        'comment' => $sanitize($data['comment']),
        'locale' => $locale,
        'approved' => true,
    ]);

    return response()->json([
        'success' => true,
        'review'  => $review
    ], 200, ['Content-Type' => 'application/json']);
}




}

