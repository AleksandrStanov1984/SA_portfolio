{{-- resources/views/portfolio/sections/experience.blade.php --}}
<div class="accordion-card experience-card open">
    <div class="accordion-header">
        <span>@lang('portfolio.experience_title')</span>
        <span class="accordion-arrow">›</span>
    </div>

    <div class="accordion-body open">
        <div class="experience-wrapper">

            @foreach($jobs as $job)
                @include('portfolio.experience.item', ['job' => $job])
            @endforeach

        </div>
    </div>
</div>



<style>
    .experience-wrapper {
        display: flex;
        flex-direction: column;
        gap: 32px;
        padding-top: 10px;
    }

    .exp-item {
        border-bottom: 1px solid #333;
        padding-bottom: 22px;
        padding-right: 6px;
    }

    .exp-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 10px;
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
