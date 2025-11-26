@extends('layouts.legal')

@section('title', __('portfolio.legal_title_impressum'))

@section('content')
<div class="page-legal">
    <div class="page-legal-card">

        @include('legal.parts.back')

        @include('legal.parts.lang-switch', [
            'routeName' => 'impressum'
        ])

        @include('legal.parts.title-impressum')

        @include('legal.parts.text-impressum')

        @include('legal.parts.actions-impressum')

    </div>
</div>
@endsection
