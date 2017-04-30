@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Редактировать категорию</div>
                    @foreach($errors->all() as $err)
                        <li class="alert alert-danger">{{$err}}</li>
                    @endforeach
                    <div class="panel-body">
                        <a href="/admin/categories"><< Назад</a>
                        <form action="/admin/categories/update/{{$category->id}}" method="post">
                            {{csrf_field()}}
                            <label for="name" class="input-group">
                                Название:
                                <textarea name="title" cols="100" rows="1">{{$category->name}}</textarea>
                            </label>
                            <label for="description" class="input-group">
                                Описание:
                                <textarea name="description" cols="100" rows="10">{{$category->description}}</textarea>
                            </label>
                            <input type="submit" class="btn" value="Сохранить">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection