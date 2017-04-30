@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Товар</div>
                    <div></div>
                    <div class="panel-body">
                        <p><b>Фото:</b></p>
                        <img src="/img/goods/{{$good->photo}}" style="max-width: 200px;max-height: 200px;"/>
                        <p><b>Название:</b></p>
                        <p>{{$good->name}}</p>
                        <p><b>Цена:</b></p>
                        <p>{{$good->price}}</p>
                        <p><b>Описание:</b></p>
                        <p>{{$good->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection