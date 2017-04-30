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
                    <form class="search-container__form" action="/search" method="get">
                        <input type="text" class="search-container__form__input" name="keyword">
                        {{csrf_field()}}
                        <button type="submit" class="search-container__form__btn">Поиск по товарам</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="content-main__container">
            <div class="news-list__container">
                @foreach($articles as $article)
                    <div class="news-list__item">
                        <div class="news-list__item__thumbnail"><img src="img/news/{{$article->photo}}"></div>
                        <div class="news-list__item__content">
                            <div class="news-list__item__content__news-title">{{$article->title}}</div>
                            <div class="news-list__item__content__news-date">{{$article->created_at}}</div>
                            <div class="news-list__item__content__news-content">
                                {{$article->text}}
                            </div>
                        </div>
                        <div class="news-list__item__content__news-btn-wrap"><a href="/article/{{$article->id}}" class="btn btn-brown">Подробнее</a></div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="content-footer__container">
            {{ $articles->links('layouts.pagination') }}
        </div>
    </div>
@endsection