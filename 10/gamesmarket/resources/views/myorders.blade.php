@extends('layouts.app')

@section('content')
<div class="content-top">
    <div class="slider"><img src="{{ asset('img/slider.png') }}" alt="Image" class="image-main"></div>
</div>
<div class="content-middle">
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">Мои заказы</div>
        </div>
        <div class="content-head__search-block">
            <div class="search-container">
                <form class="search-container__form" action="/search" method="get">
                    <input type="text" class="search-container__form__input" name="keyword">
                    {{csrf_field()}}
                    <button type="submit" class="search-container__form__btn">Поиск по товарам</button>
                </form>
            </div>
        </div>
    </div>
    <div class="content-main__container">
        <div class="cart-product-list">
            @foreach($orders as $order)
                <div class="cart-product-list__item">
                    <div class="cart-product__item__product-photo"><img src="/img/goods/{{$order->good->photo}}" class="cart-product__item__product-photo__image"></div>
                    <div class="cart-product__item__product-name">
                        <div class="cart-product__item__product-name__content"><a href="/good/{{$order->good->id}}">{{$order->good->name}}</a></div>
                    </div>
                    <div class="cart-product__item__cart-date">
                        <div class="cart-product__item__cart-date__content">{{$order->created_at}}</div>
                    </div>
                    <div class="cart-product__item__product-price"><span class="product-price__value">{{$order->price}} руб</span></div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="content-footer__container">
        {{ $orders->links('layouts.pagination') }}
    </div>
</div>
@endsection