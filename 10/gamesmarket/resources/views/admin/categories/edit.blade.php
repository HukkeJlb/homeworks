@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Редактировать категорию</div>
                    @foreach($errors->all() as $err)
                        <li>{{$err}}</li>
                    @endforeach
                    <div class="panel-body">
                        <form action="/admin/categories/update/{{$category->id}}" method="post">
                            {{csrf_field()}}
                            <label for="name" class="input-group">
                                Название:
                                <input type="text" name="name" value="{{$category->name}}">
                            </label>
                            <label for="description" class="input-group">
                                Описание:
                                <textarea name="description" cols="30" rows="10">{{$category->description}}</textarea>
                            </label>
                            <input type="submit" class="btn" value="Сохранить">
                        </form>
                        <a href="/admin/categories" class="btn">Вернуться к списку</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection