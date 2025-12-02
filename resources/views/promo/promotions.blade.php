@extends('layouts.app')

@section('title', __('promo.promotions_title'))

@section('content')
<div class="page-wrapper">
    <h1>{{ __('promo.promotions_title') }}</h1>
    <p>{{ __('promo.promotions_description') }}</p>
</div>
@endsection
