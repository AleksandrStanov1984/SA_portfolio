<div class="exp-item">

    <div class="exp-header">
        <div class="exp-title">
            <strong>@lang("portfolio.{$job['role']}")</strong><br>
            <span class="exp-company">@lang("portfolio.{$job['company']}")</span>
        </div>

        <div class="exp-period">
            @lang("portfolio.{$job['period']}")
        </div>
    </div>

    <ul class="exp-list">
        @foreach($job['items'] as $item)
            <li>@lang("portfolio.$item")</li>
        @endforeach
    </ul>

</div>
