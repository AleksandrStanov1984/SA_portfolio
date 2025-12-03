<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactController;
use Barryvdh\DomPDF\Facade\Pdf;


Route::get('/healthz', function () {
    return response()->json(['status' => 'ok'], 200);
});

// ===============================
//  ЯЗЫК ПО УМОЛЧАНИЮ → DE
// ===============================
Route::redirect('/', '/de');


// ===============================
//  ГЛАВНАЯ СТРАНИЦА PORTFOLIO
// ===============================
Route::get('/{locale}', [PortfolioController::class, 'index'])
    ->name('portfolio')
    ->whereIn('locale', ['de', 'en', 'ru']);


// ===============================
//  REVIEWS
// ===============================
Route::post('/{locale}/reviews/store', [ReviewController::class, 'store'])
    ->name('reviews.store')
    ->whereIn('locale', ['de', 'en', 'ru']);

Route::post('/{locale}/portfolio/rating-click', [PortfolioController::class, 'rateClick'])
    ->name('portfolio.review.rate')
    ->whereIn('locale', ['de', 'en', 'ru']);


// ===============================
//  PORTFOLIO PDF
// ===============================
Route::get('/{locale}/portfolio.pdf', [PortfolioController::class, 'downloadPdf'])
    ->name('portfolio.pdf')
    ->whereIn('locale', ['de', 'en', 'ru']);


// ===============================
//  LEGAL PAGES (HTML)
// ===============================
Route::get('/{locale}/impressum', function ($locale) {
    app()->setLocale($locale);
    return view('legal.impressum', ['locale' => $locale]);
})->name('impressum')->whereIn('locale', ['de', 'en', 'ru']);

Route::get('/{locale}/datenschutz', function ($locale) {
    app()->setLocale($locale);
    return view('legal.datenschutz', ['locale' => $locale]);
})->name('datenschutz')->whereIn('locale', ['de', 'en', 'ru']);


// ===============================
//  LEGAL PDF
// ===============================
Route::get('/{locale}/impressum.pdf', function ($locale) {
    app()->setLocale($locale);
    $pdf = Pdf::loadView('pdf.impressum', ['locale' => $locale]);
    return $pdf->download("impressum-{$locale}.pdf");
})->name('impressum.pdf')->whereIn('locale', ['de', 'en', 'ru']);

Route::get('/{locale}/datenschutz.pdf', function ($locale) {
    app()->setLocale($locale);
    $pdf = Pdf::loadView('pdf.datenschutz', ['locale' => $locale]);
    return $pdf->download("datenschutz-{$locale}.pdf");
})->name('datenschutz.pdf')->whereIn('locale', ['de', 'en', 'ru']);


// ===============================
//  CONTACT FORM
// ===============================
Route::post('/{locale}/contact/send', [ContactController::class, 'send'])
    ->name('contact.send')
    ->whereIn('locale', ['de', 'en', 'ru']);


// ===============================
//  PAGINATED REVIEWS
// ===============================
Route::get('/{locale}/reviews/paginated', function ($locale) {
    app()->setLocale($locale);

    $reviews = \App\Models\Review::where('approved', true)
        ->latest()
        ->paginate(5);

    return view('portfolio.sections.reviews-paginated', [
        'reviews' => $reviews,
        'locale'  => $locale
    ]);
})->name('reviews.paginated')->whereIn('locale', ['de', 'en', 'ru']);


// ===============================
//  ⭐️ PROMO PAGES
// ===============================
Route::group([
    'prefix' => '{locale}/services',
    'where'  => ['locale' => 'de|en|ru']
], function () {

    Route::get('/menu-price', function($locale) {
        app()->setLocale($locale);
        return view('promo.menu-price', ['locale' => $locale]);
    })->name('promo.menu-price');

    Route::get('/full-websites', function($locale) {
        app()->setLocale($locale);
        return view('promo.full-websites', ['locale' => $locale]);
    })->name('promo.full-websites');

    Route::get('/landing-pages', function($locale) {
        app()->setLocale($locale);
        return view('promo.landing-pages', ['locale' => $locale]);
    })->name('promo.landing-pages');

    Route::get('/promotions', function($locale) {
        app()->setLocale($locale);
        return view('promo.promotions', ['locale' => $locale]);
    })->name('promo.promotions');

    Route::get('/support', function($locale) {
        app()->setLocale($locale);
        return view('promo.support', ['locale' => $locale]);
    })->name('promo.support');

    Route::get('/multilingual', function($locale) {
        app()->setLocale($locale);
        return view('promo.multilingual', ['locale' => $locale]);
    })->name('promo.multilingual');

    Route::get('/ecommerce', function($locale) {
        app()->setLocale($locale);
        return view('promo.ecommerce', ['locale' => $locale]);
    })->name('promo.ecommerce');

});

