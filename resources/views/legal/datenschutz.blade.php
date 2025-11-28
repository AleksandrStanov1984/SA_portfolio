@extends('layouts.legal')

@section('title', __('portfolio.legal_title_privacy'))

@section('content')
<div class="page-legal">
    <div class="page-legal-card">

        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:18px;">

            <div>
                @include('legal.parts.back')
            </div>

            <div>
                @include('legal.parts.lang-switch', ['routeName' => 'datenschutz'])
            </div>

        </div>

        @include('legal.parts.title-privacy')

        @include('legal.parts.text-privacy')

        @include('legal.parts.actions-privacy')

    </div>
</div>
@endsection
