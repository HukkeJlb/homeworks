@extends('layouts.app')

@section('content')
    <div class="content-top">
        <div class="slider"><img src="{{ asset('img/slider.png') }}" alt="Image" class="image-main"></div>
    </div>
    <div class="content-middle">
        <div class="content-head__container">
            <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">Новости</div>
            </div>
            <div class="content-head__search-block">
                <div class="search-container">
                    <form class="search-container__form" action="/search" method="post">
                        {{csrf_field()}}
                        <input type="text" class="search-container__form__input" name="keyword">
                        <button type="submit" class="search-container__form__btn">Поиск по товарам</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="content-main__container">
            <div class="news-block content-text">
                <h3 class="content-text__title">
                    {{$article->title}}
                    <p>
                        <b>{{$article->created_at}}</b>
                    </p>
                </h3><img src="/img/news/{{$article->photo}}" alt="Image" class="alignleft img-news">
                <p>
                    {{$article->text}}
                </p>
            </div>
        </div>
    </div>
    <div class="content-bottom">
        <div class="line"></div>
        <div class="content-head__container" style="margin-top: 100px">
            <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">Посмотрите наши товары</div>
            </div>
        </div>
        <div class="content-main__container">
            <div class="products-columns">
                @foreach($goods as $good)
                    <div class="products-columns__item">
                        <div class="products-columns__item__title-product"><a href="/good/{{$good->id}}" class="products-columns__item__title-product__link">{{$good->name}}</a></div>
                        <div class="products-columns__item__thumbnail"><a href="/good/{{$good->id}}" class="products-columns__item__thumbnail__link"><img src="/img/goods/{{$good->photo}}" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
                        <div class="products-columns__item__description"><span class="products-price">{{$good->price}} руб</span><a href="/good/{{$good->id}}" class="btn btn-blue">Купить</a></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection