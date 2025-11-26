{{-- resources/views/portfolio/reviews/pagination.blade.php --}}
<div style="display:flex;justify-content:center;margin-top:14px;gap:8px;">
    @for($i = 1; $i <= $reviews->lastPage(); $i++)
        <a href="?page={{ $i }}"
           style="padding:6px 12px;border-radius:8px;background:{{ $i == $reviews->currentPage() ? '#1e3a8a':'#0f172a' }};
               color:white;border:1px solid #243045;">
            {{ $i }}
        </a>
    @endfor
</div>
