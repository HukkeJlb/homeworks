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
        <div class="content-main__container">
            <div class="products-columns">
                @foreach($goods as $good)
                    <div class="products-columns__item">
                        <div class="products-columns__item__title-product"><a href="/good/{{$good->id}}" class="products-columns__item__title-product__link">{{$good->name}}</a></div>
                        <div class="products-columns__item__thumbnail"><a href="/good/{{$good->id}}" class="products-columns__item__thumbnail__link"><img src="img/goods/{{$good->photo}}" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
                        <div class="products-columns__item__description"><span class="products-price">{{$good->price}} руб</span><a href="/good/{{$good->id}}" class="btn btn-blue">Купить</a></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="content-footer__container">
        {{ $goods->links('layouts.pagination') }}
    </div>
@endsection