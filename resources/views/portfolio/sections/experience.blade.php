@php
    // Список мест работы в порядке сверху вниз
    $jobs = [
        'mrs' => [
            'role'    => 'exp_mrs_role',
            'company' => 'exp_mrs_company',
            'period'  => 'exp_mrs_period',
            'items'   => ['exp_mrs_li1','exp_mrs_li2','exp_mrs_li3','exp_mrs_li4'],
        ],
        'arven' => [
            'role'    => 'exp_arven_role',
            'company' => 'exp_arven_company',
            'period'  => 'exp_arven_period',
            'items'   => ['exp_arven_li1','exp_arven_li2','exp_arven_li3','exp_arven_li4'],
        ],
        'sohonet' => [
            'role'    => 'exp_sohonet_role',
            'company' => 'exp_sohonet_company',
            'period'  => 'exp_sohonet_period',
            'items'   => ['exp_sohonet_li1','exp_sohonet_li2','exp_sohonet_li3','exp_sohonet_li4'],
        ],
        'smartzone' => [
            'role'    => 'exp_szua_role',
            'company' => 'exp_szua_company',
            'period'  => 'exp_szua_period',
            'items'   => ['exp_szua_li1','exp_szua_li2','exp_szua_li3','exp_szua_li4'],
        ],
        'grain' => [
            'role'    => 'exp_grain_role',
            'company' => 'exp_grain_company',
            'period'  => 'exp_grain_period',
            'items'   => ['exp_grain_li1','exp_grain_li2','exp_grain_li3','exp_grain_li4'],
        ],
    ];
@endphp

<div class="experience-wrapper">

    @foreach($jobs as $key => $job)
        <div class="exp-item" data-exp="{{ $key }}">

            {{-- Верхняя строка: должность + сроки --}}
            <div class="exp-header">
                <div class="exp-title">
                    <strong>@lang("portfolio.{$job['role']}")</strong><br>
                    <span class="exp-company">@lang("portfolio.{$job['company']}")</span>
                </div>

                <div class="exp-period">
                    @lang("portfolio.{$job['period']}")
                </div>
            </div>

            {{-- Список задач --}}
            <ul class="exp-list">
                @foreach($job['items'] as $item)
                    <li>@lang("portfolio.$item")</li>
                @endforeach
            </ul>

        </div>
    @endforeach

</div>

{{-- Стили --}}
<style>
    .experience-wrapper {
        display: flex;
        flex-direction: column;
        gap: 32px;
    }

    .exp-item {
        border-bottom: 1px solid #333;
        padding-bottom: 22px;
    }

    .exp-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 10px;
    }

    .exp-title {
        font-size: 1.1rem;
        line-height: 1.3;
    }

    .exp-company {
        color: #9ca3af;
        font-size: 0.95rem;
    }

    .exp-period {
        font-size: 0.95rem;
        color: #9ca3af;
        white-space: nowrap;
    }

    .exp-list {
        margin-top: 8px;
        padding-left: 20px;
        line-height: 1.4;
    }
</style>
