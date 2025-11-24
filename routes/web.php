<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Корень ведёт на язык по умолчанию
Route::redirect('/', '/de');

// Один маршрут для портфолио
Route::get('/{locale}', [PortfolioController::class, 'index'])
    ->name('portfolio')
    ->whereIn('locale', ['de', 'en', 'ru']);

// Маршрут для отправки отзывов
Route::post('/{locale}/review', [PortfolioController::class, 'storeReview'])
    ->name('portfolio.review.store')
    ->whereIn('locale', ['de', 'en', 'ru']);

// отдельный AJAX-метод для клика по звёздам
Route::post('/{locale}/portfolio/rating-click', [PortfolioController::class, 'rateClick'])
    ->name('portfolio.review.rate');

// Маршрут для PDF
Route::get('/{locale}/portfolio.pdf', [PortfolioController::class, 'downloadPdf'])
    ->name('portfolio.pdf')
    ->whereIn('locale', ['de', 'en', 'ru']);
