@extends('layouts.app')

@section('title', __('promo.multilingual_title'))

@section('content')
<div class="page-wrapper">
    <h1>{{ __('promo.multilingual_title') }}</h1>
    <p>{{ __('promo.multilingual_description') }}</p>
</div>
@endsection
