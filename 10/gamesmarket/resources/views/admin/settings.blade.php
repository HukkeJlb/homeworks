@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Настройки</div>
                    <div class="panel-body">
                        Адрес для получения уведомлений
                        <form action="/admin/settings/store" method="post">
                            {{csrf_field()}}
                            @foreach($settings as $set)
                            <label for="{{$set->key}}" class="input-group">
                                {{$set->key}}:
                                <input type="text" name="{{$set->key}}" value="{{$set->value}}">
                            </label>
                            @endforeach
                            <input type="submit" class="btn" value="Сохранить">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection