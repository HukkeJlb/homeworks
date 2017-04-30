@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Статья</div>
                    <div></div>
                    <div class="panel-body">
                        <a href="/admin/articles"><< Назад</a>
                        <p><b>Фото:</b></p>
                        <img src="/img/news/{{$article->photo}}" style="max-width: 200px;max-height: 200px;"/>
                        <p><b>Название:</b></p>
                        <p>{{$article->title}}</p>
                        <p><b>Описание:</b></p>
                        <p>{{$article->text}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection