@extends('template.template')
@section('container')
    <link rel="stylesheet" href="{{ asset("css/cart.css") }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $userProductsExist = false;
    @endphp

    @foreach ($cart as $u)
        @if ($u->user_id == $currentUserId)
            @php
                $userProductsExist = true;
            @endphp
            <a href="#" class="card-wrapper">
                <div class="card">
                    <img src="{{ asset($u->photo_path) }}" alt="Product Image">
                    <div class="card-content">
                        <div class="card-title">{{ $u->name }}</div>
                        <div class="card-description">{{ $u->description }}</div>
                        <div class="card-price">{{ $u->price }} <span class="card-category">{{ $u->genre }}</span></div>
                    </div>
                </div>
            </a>
        @endif
    @endforeach

    @if (!$userProductsExist)
        <p>У вас нет своих товаров.</p>
    @endif
@endsection
