<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, string $locale)
    {
        app()->setLocale($locale);

        // Валидация
        $data = $request->validate([
            'name'    => ['nullable', 'string', 'max:80'],
            'rating'  => ['required', 'integer', 'min:1', 'max:5'],
            'comment' => ['required', 'string', 'max:250'],
        ]);

        // Санитария
        $sanitize = static function (?string $v): ?string {
            if ($v === null) return null;
            $v = strip_tags($v);
            $v = preg_replace('/[\x00-\x1F\x7F\x{2028}\x{2029}]/u', ' ', $v);
            $v = preg_replace('/\s+/u', ' ', $v);
            return trim($v) ?: null;
        };

        $data['name']     = $sanitize($data['name']);
        $data['comment']  = $sanitize($data['comment']);
        $data['locale']   = $locale;
        $data['approved'] = true; // автоодобрение

        // Сохранение
        $review = Review::create($data);

        // AJAX ответ
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'review'  => $review
            ]);
        }

        // Обычный POST
        return back()->with('success', true);
    }
}

