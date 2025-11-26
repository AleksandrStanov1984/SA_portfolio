@extends('layouts.legal')

@section('title', __('portfolio.legal_title_privacy'))

@section('content')
<div class="page-legal">
    <div class="page-legal-card">

        @include('legal.parts.back')

        @include('legal.parts.lang-switch', [
            'routeName' => 'datenschutz'
        ])

        @include('legal.parts.title-privacy')

        @include('legal.parts.text-privacy')

        @include('legal.parts.actions-privacy')

    </div>
</div>
@endsection
