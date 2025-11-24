<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class PortfolioController extends Controller
{
    protected array $locales = ['de', 'en', 'ru'];

    protected function resolveLocale(?string $locale): string
    {
        $locale = $locale ?? config('app.locale', 'de');

        if (! in_array($locale, $this->locales, true)) {
            abort(404);
        }

        app()->setLocale($locale);

        return $locale;
    }

    public function index(string $locale = null)
    {
        $locale = $this->resolveLocale($locale);

        return view('portfolio', [
            'locale' => $locale,
        ]);
    }

   public function downloadPdf(string $locale)
   {
       $locale = $this->resolveLocale($locale);

       $url = route('portfolio', ['locale' => $locale]);
       $script = base_path('scripts\make-pdf.cjs');


       if (! file_exists($script)) {
           return response("PDF script not found: {$script}", 500);
       }

       $process = new \Symfony\Component\Process\Process([
           'node',
           $script,
           $url,
       ]);

       $process->setTimeout(120);
       $process->run();

       if (! $process->isSuccessful()) {
           return response(
               "NODE / PUPPETEER ERROR:\n\n" .
               $process->getErrorOutput() .
               "\n\nSTDOUT:\n" .
               $process->getOutput(),
               500,
               ['Content-Type' => 'text/plain; charset=utf-8']
           );
       }

       $pdfBinary = $process->getOutput();

       return response($pdfBinary, 200, [
           'Content-Type'        => 'application/pdf',
           'Content-Disposition' => 'attachment; filename="Oleksandr_Stanov_Portfolio_'.$locale.'.pdf"',
       ]);
   }

}
