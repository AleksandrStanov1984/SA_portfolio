<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function impressum(string $locale)
    {
        app()->setLocale($locale);

        $pdf = Pdf::loadView('pdf.impressum');

        return $pdf->download("impressum-$locale.pdf");
    }

    public function datenschutz(string $locale)
    {
        app()->setLocale($locale);

        $pdf = Pdf::loadView('pdf.datenschutz');

        return $pdf->download("datenschutz-$locale.pdf");
    }
}
