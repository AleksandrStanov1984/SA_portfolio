<?php

namespace App\Http\Controllers;

use App\Models\Review;
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

    public function index(string $locale = 'de')
    {
    // Запоминаем начальный язык пользователя
        session(['portfolio_start_locale' => $locale]);

        app()->setLocale($locale);

        $reviews = Review::where('approved', true)
            ->latest()
            ->paginate(5);

        return view('portfolio', [
            'locale'  => $locale,
            'jobs'   => config('experience'),
            'reviews' => $reviews,
        ]);
    }

    public function downloadPdf(string $locale)
    {
        $locale = $this->resolveLocale($locale);

        $url = route('portfolio', ['locale' => $locale]);
        $script = base_path('scripts/make-pdf.cjs');

        $nodePath = 'C:\\Program Files\\nodejs\\node.exe';
        $chromePath = 'C:\\Users\\aleks\\.cache\\puppeteer\\chromium\\win64-1549233\\chrome-win\\chrome.exe';

        $tempPdf = storage_path('app/pdf_' . uniqid() . '.pdf');

        $process = new Process([
            $nodePath,
            $script,
            $url,
            $tempPdf
        ]);

        $process->setTimeout(180);
        $process->run();

        if (!$process->isSuccessful()) {
            return response(
                "NODE / PUPPETEER ERROR:\n\n" .
                $process->getErrorOutput() .
                "\n\nSTDOUT:\n" .
                $process->getOutput(),
                500
            );
        }

        if (!file_exists($tempPdf)) {
            return response("PDF NOT GENERATED", 500);
        }

        $pdf = file_get_contents($tempPdf);
        unlink($tempPdf);

        return response($pdf, 200, [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => 'attachment; filename=\"sa_portfolio.pdf\"',
        ]);
    }

    public function rateClick(Request $request, string $locale = 'de')
    {
        $rating = (int) $request->input('rating');

        if ($rating < 1 || $rating > 5) {
            return response()->json(['status' => 'error', 'message' => 'invalid rating'], 422);
        }

        RatingClick::create([
            'rating'     => $rating,
            'locale'     => $locale,
            'ip'         => $request->ip(),
            'user_agent' => substr((string) $request->userAgent(), 0, 255),
        ]);

        return response()->json(['status' => 'ok']);
    }
}

