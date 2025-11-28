@extends('layouts.legal')

@section('title', __('portfolio.legal_title_impressum'))

@section('content')
<div class="page-legal">
    <div class="page-legal-card">

        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:18px;">

            {{-- Back button LEFT --}}
            <div>
                @include('legal.parts.back')
            </div>

            {{-- Language switch RIGHT --}}
            <div>
                @include('legal.parts.lang-switch', ['routeName' => 'impressum'])
            </div>

        </div>

        @include('legal.parts.title-impressum')

        @include('legal.parts.text-impressum')

        @include('legal.parts.actions-impressum')

    </div>
</div>
@endsection
