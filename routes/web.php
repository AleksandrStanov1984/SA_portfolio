<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

// редирект с корня на язык по умолчанию
Route::get('/', function () {
    return redirect('/de');
});

// группа /{locale}
Route::group([
    'prefix' => '{locale}',
    'where'  => ['locale' => 'en|de|ru'],
], function () {
    Route::get('/', [PortfolioController::class, 'index'])
        ->name('portfolio');

    Route::get('/download-pdf', [PortfolioController::class, 'downloadPdf'])
        ->name('portfolio.pdf');
});
