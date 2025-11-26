{{-- resources/views/portfolio/reviews/list.blade.php --}}
<div class="reviews-list" style="display:flex;flex-direction:column;gap:12px;">
    @foreach($reviews as $review)
        <div style="background:#0f172a;border:1px solid #243045;border-radius:12px;padding:14px 18px;">
            <div style="display:flex;justify-content:space-between;align-items:center;">
                <span style="font-weight:600;color:white;">{{ $review->name ?? 'Anonymous' }}</span>
                <span>
                    @for($i=1;$i<=5;$i++)
                        <span style="color:{{ $i <= $review->rating ? '#facc15' : '#475569' }}">★</span>
                    @endfor
                </span>
            </div>
            <p style="color:#cbd5e1;margin-top:6px;">{{ $review->comment }}</p>
        </div>
    @endforeach
</div>
