<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    @if (isset($title_page))
    <title>{{$title_page}} | {{ config('app.name', 'Laravel') }}</title>
    @else
      <title>{{ config('app.name', 'Laravel') }}</title>
    @endif
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{ asset('css/libs.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script>
      window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
      ]) !!};
    </script>
  </head>
  <body>
    <div class="main-wrapper">
      <header class="main-header">
        <div class="logotype-container"><a href="/" class="logotype-link"><img src="{{ asset('img/logo.png') }}" alt="Логотип"></a></div>
        <nav class="main-navigation">
          <ul class="nav-list">
            <li class="nav-list__item"><a href="/" class="nav-list__item__link">Главная</a></li>
            @if (Auth::check())<li class="nav-list__item"><a href="/myorders" class="nav-list__item__link">Мои заказы</a></li>@endif
            <li class="nav-list__item"><a href="/news" class="nav-list__item__link">Новости</a></li>
            <li class="nav-list__item"><a href="/about" class="nav-list__item__link">О магазине</a></li>
          </ul>
        </nav>
        <div class="header-contact">
          <div class="header-contact__phone"><a href="#" class="header-contact__phone-link">Телефон: 8-800-555-35-35</a></div>
        </div>
        <div class="header-container">
          <div class="payment-container">
            @if (!Auth::guest())
            <div class="payment-basket__status">
              <div class="payment-basket__status__icon-block"><a class="payment-basket__status__icon-block__link"><i class="fa fa-shopping-basket"></i></a></div>
              <div class="payment-basket__status__basket"><span class="payment-basket__status__basket-value">{{$countOrders}}</span><span class="payment-basket__status__basket-value-descr">товаров</span></div>
            </div>
          </div>
          @endif
          @if (Auth::guest())
            <div class="authorization-block"><a href="{{ route('register') }}" class="authorization-block__link">Регистрация</a><a href="{{ route('login') }}" class="authorization-block__link">Войти</a></div>
          @else
            <div class="authorization-block">
              <a href="/myorders" class="authorization-block__link" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>
              @if(Auth::user()->is_admin)
                <a href="/admin" class="authorization-block__link">AdminPanel</a>
              @endif
              <a href="{{ route('logout') }} " class="authorization-block__link"
                 onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                Выйти
              </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
            </div>
          @endif
        </div>
      </header>
      <div class="middle">
        <div class="sidebar">
          <div class="sidebar-item">
            <div class="sidebar-item__title">Категории</div>
            <div class="sidebar-item__content">
              <ul class="sidebar-category">
                @if (isset($categories))
                @foreach($categories as $category)
                  <li class="sidebar-category__item"><a href="/category/{{$category->id}}" class="sidebar-category__item__link">{{$category->name}}</a></li>
                @endforeach
                @endif
              </ul>
            </div>
          </div>
          <div class="sidebar-item">
            <div class="sidebar-item__title">Последние новости</div>
            <div class="sidebar-item__content">
              <div class="sidebar-news">
                <div class="sidebar-news__item">
                  @if (isset($last_articles))
                  @foreach($last_articles as $article)
                    <div class="sidebar-news__item">
                      @if($article->photo)
                        <div class="sidebar-news__item__preview-news"><img src="/img/news/{{$article->photo}}" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
                      @endif
                      <div class="sidebar-news__item__title-news"><a href="/article/{{$article->id}}" class="sidebar-news__item__title-news__link">{{$article->title}}</a></div>
                    </div>
                  @endforeach
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="main-content">
          @yield('content')
        </div>
      </div>
      <footer class="footer">
        <div class="footer__footer-content">
          <div class="footer__footer-content__main-content">
            <p>
              Интернет-магазин компьютерных игр ГЕЙМСМАРКЕТ - это
              онлайн-магазин игр для геймеров, существующий на рынке уже 5 лет.
              У нас широкий спектр лицензионных игр на компьютер, ключей для игр - для активации
              и авторизации, а также карты оплаты (game-card, time-card, игровые валюты и т.д.),
              коды продления и многое друго. Также здесь всегда можно узнать последние новости
              из области онлайн-игр для PC. На сайте предоставлены самые востребованные и
              актуальные товары MMORPG, приобретение которых здесь максимально удобно и,
              что немаловажно, выгодно!
            </p>
          </div>
        </div>
        <div class="footer__social-block">
          <ul class="social-block__list bcg-social">
            <li class="social-block__list__item"><a href="https://www.facebook.com" class="social-block__list__item__link"><i class="fa fa-facebook"></i></a></li>
            <li class="social-block__list__item"><a href="https://twitter.com/" class="social-block__list__item__link"><i class="fa fa-twitter"></i></a></li>
            <li class="social-block__list__item"><a href="https://www.youtube.com/" class="social-block__list__item__link"><i class="fa fa-instagram"></i></a></li>
          </ul>
        </div>
      </footer>
    </div>
    <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script src="{{asset('js/main.js')}}"></script>
  </body>
</html>