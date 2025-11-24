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
        app()->setLocale($locale);

        $reviews = Review::where('approved', true)
            ->where('locale', $locale)
            ->latest()
            ->take(10)
            ->get();

        return view('portfolio', [
            'locale'  => $locale,
            'reviews' => $reviews,
        ]);
    }

    public function storeReview(Request $request, ?string $locale = null)
    {
        $locale = $this->resolveLocale($locale);
        app()->setLocale($locale);

        // 1. Базовая валидация
        $data = $request->validate([
            'name'    => ['nullable', 'string', 'max:80'],
            'rating'  => ['required', 'integer', 'min:1', 'max:5'],
            // увеличь/уменьши max по вкусу
            'comment' => ['required', 'string', 'max:250'],
        ]);

        // 2. Универсальная функция "превратить во вполне безопасный текст"
        $sanitize = static function (?string $value): ?string {
            if ($value === null) {
                return null;
            }

            // убираем html-теги полностью
            $value = strip_tags($value);

            // убираем управляющие символы (\x00–\x1F, \x7F, переносы формата и т.п.)
            $value = preg_replace('/[\x00-\x1F\x7F\x{2028}\x{2029}]/u', ' ', $value);

            // схлопываем повторяющиеся пробелы/переводы строк в один пробел
            $value = preg_replace('/\s+/u', ' ', $value);

            // обрезаем по краям
            $value = trim($value);

            // если после всего строка пустая — считаем её null
            return $value !== '' ? $value : null;
        };

        $data['name']    = $sanitize($data['name'] ?? null);
        $data['comment'] = $sanitize($data['comment'] ?? null);

        // дополнительно можно перестраховаться по длине после очистки
        if ($data['name'] !== null && mb_strlen($data['name']) > 80) {
            $data['name'] = mb_substr($data['name'], 0, 80);
        }
        if ($data['comment'] !== null && mb_strlen($data['comment']) > 250) {
            $data['comment'] = mb_substr($data['comment'], 0, 250);
        }

        $data['locale']   = $locale;
        $data['approved'] = false; // или true, если автоапрув

        Review::create($data);

        return back()->with('review_submitted', true);
    }

   public function downloadPdf(string $locale)
   {
       $locale = $this->resolveLocale($locale);

       $url = route('portfolio', ['locale' => $locale]);
       $script = base_path('scripts/make-pdf.cjs');

       $nodePath = 'C:\\Program Files\\nodejs\\node.exe';

       $chromePath = 'C:\\Users\\aleks\\.cache\\puppeteer\\chromium\\win64-1549233\\chrome-win\\chrome.exe';

       // 🔥 Временный PDF-файл
       $tempPdf = storage_path('app/pdf_' . uniqid() . '.pdf');

       $process = new \Symfony\Component\Process\Process([
           $nodePath,
           $script,
           $url,
           $tempPdf,
           $output = 'php://stdout',
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
           'Content-Disposition' => 'attachment; filename="sa_portfolio.pdf"',
       ]);
   }


    public function rateClick(Request $request, string $locale = 'de'): JsonResponse
    {
        // простой sanity-check, без создания отзыва
        $rating = (int) $request->input('rating');

        if ($rating < 1 || $rating > 5) {
            return response()->json(['status' => 'error', 'message' => 'invalid rating'], 422);
        }

        // здесь варианты:
        // 1) просто логируем факт клика (в БД/логах)
        // 2) сохраняем в отдельную таблицу rating_clicks
        // 3) или пока ничего не пишем, только успешный ответ

        RatingClick::create([
           'rating'     => $rating,
           'locale'     => $locale,
           'ip'         => $request->ip(),
           'user_agent' => substr((string) $request->userAgent(), 0, 255),
        ]);

        return response()->json(['status' => 'ok']);
    }
}
