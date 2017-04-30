@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Категория</div>
                    <div class="panel-body">
                        <a href="/admin/categories"><< Назад</a>
                        <p>Название:</p>
                        <p>{{$category->name}}</p>
                        <p>Описание:</p>
                        <p>{{$category->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection