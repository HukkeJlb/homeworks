@extends('layouts.app')

@section('content')
    <div class="content-top">
        <div class="slider"><img src="{{ asset('img/slider.png') }}" alt="Image" class="image-main"></div>
    </div>
    <div class="content-middle">
        <div class="content-head__container">
            <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">{{$title}}</div>
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
    </div>
    <div class="content-main__container">
        <div class="product-container">
            <div class="product-container__image-wrap"><img src="/img/goods/{{$good->photo}}" class="image-wrap__image-product"></div>
            <div class="product-container__content-text">
                <div class="product-container__content-text__title">{{$good->name}}</div>
                <div class="product-container__content-text__price">
                    <div class="product-container__content-text__price__value">
                        Цена: <b>{{$good->price}}</b>
                        руб
                    </div><a class="popup-link btn btn-blue" href="javascript:PopUpShow()">Купить</a>
                </div>
                <div class="product-container__content-text__description">
                    {{$good->description}}
                </div>
            </div>
        </div>
    </div>

    <div class="popup-box" id="popup-box">
        <div class="close">X</div>
        <div class="top">
            <h2>Для того, чтобы оформить заказ на {{$good->name}} оставьте, пожалуйста, свои контактные данные. Наши менеджеры с Вами свяжутся в ближайшее время.</h2>
        </div>
        <div class="bottom">
            <form id="order" action="/orders/store" method="get">
                {{csrf_field()}}
                <input type="hidden" name="good_id" value="{{$good->id}}">
                <input type="hidden" name="price" value="{{$good->price}}">
                <input type="text" name="name" class="search-container__form__input" placeholder="Введите имя" value="@if (Auth::check()){{ Auth::user()->name }}@endif">
                <input type="text" name="email" class="search-container__form__input" placeholder="Введите email" value="@if (Auth::check()){{ Auth::user()->email }}@endif">
                <input type="submit" class="btn btn-blue" value="Заказать">
                <div id="er"></div>
            </form>
        </div>
    </div>
@endsection