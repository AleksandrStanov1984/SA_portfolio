<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ReviewController;

// Язык по умолчанию
Route::redirect('/', '/de');

// Страница портфолио
Route::get('/{locale}', [PortfolioController::class, 'index'])
    ->name('portfolio')
    ->whereIn('locale', ['de', 'en', 'ru']);

// ✔ Единственный рабочий маршрут отзывов
Route::post('/{locale}/reviews/store', [ReviewController::class, 'store'])
    ->name('reviews.store')
    ->whereIn('locale', ['de', 'en', 'ru']);

// Ajax нажатия звёзд
Route::post('/{locale}/portfolio/rating-click', [PortfolioController::class, 'rateClick'])
    ->name('portfolio.review.rate');

// PDF
Route::get('/{locale}/portfolio.pdf', [PortfolioController::class, 'downloadPdf'])
    ->name('portfolio.pdf')
    ->whereIn('locale', ['de', 'en', 'ru']);
