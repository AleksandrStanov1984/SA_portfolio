<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactController;
use Barryvdh\DomPDF\Facade\Pdf;

// Язык по умолчанию
Route::redirect('/', '/de');

// Страница портфолио
Route::get('/{locale}', [PortfolioController::class, 'index'])
    ->name('portfolio')
    ->whereIn('locale', ['de', 'en', 'ru']);

// Сохранение отзывов
Route::post('/{locale}/reviews/store', [ReviewController::class, 'store'])
    ->name('reviews.store')
    ->whereIn('locale', ['de', 'en', 'ru']);

// Ajax нажатия звёзд
Route::post('/{locale}/portfolio/rating-click', [PortfolioController::class, 'rateClick'])
    ->name('portfolio.review.rate')
    ->whereIn('locale', ['de', 'en', 'ru']);

// Portfolio PDF
Route::get('/{locale}/portfolio.pdf', [PortfolioController::class, 'downloadPdf'])
    ->name('portfolio.pdf')
    ->whereIn('locale', ['de', 'en', 'ru']);

// Legal pages
Route::get('/{locale}/impressum', function (string $locale) {
    app()->setLocale($locale);
    return view('legal.impressum', ['locale' => $locale]);
})->name('impressum')->whereIn('locale', ['de', 'en', 'ru']);

Route::get('/{locale}/datenschutz', function (string $locale) {
    app()->setLocale($locale);
    return view('legal.datenschutz', ['locale' => $locale]);
})->name('datenschutz')->whereIn('locale', ['de', 'en', 'ru']);


// ================================
// PDF — ОФИЦИАЛЬНЫЕ ИСПРАВЛЕННЫЕ
// ================================

// IMPRESSUM PDF
Route::get('/{locale}/impressum.pdf', function (string $locale) {
    app()->setLocale($locale);

    $pdf = Pdf::loadView('pdf.impressum', [
        'locale' => $locale,
    ]);

    return $pdf->download("impressum-{$locale}.pdf");
})->name('impressum.pdf')->whereIn('locale', ['de', 'en', 'ru']);


// DATENSCHUTZ PDF
Route::get('/{locale}/datenschutz.pdf', function (string $locale) {
    app()->setLocale($locale);

    $pdf = Pdf::loadView('pdf.datenschutz', [
        'locale' => $locale,
    ]);

    return $pdf->download("datenschutz-{$locale}.pdf");
})->name('datenschutz.pdf')->whereIn('locale', ['de', 'en', 'ru']);


// Контактная форма
Route::post('/{locale}/contact/send', [ContactController::class, 'send'])
    ->name('contact.send')
    ->whereIn('locale', ['de', 'en', 'ru']);
