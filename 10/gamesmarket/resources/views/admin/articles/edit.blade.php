@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Редактировать статью</div>
                    @foreach($errors->all() as $err)
                        <li class="alert alert-danger">{{$err}}</li>
                    @endforeach
                    <div class="panel-body">
                        <a href="/admin/articles"><< Назад</a>
                        <form action="/admin/articles/update/{{$article->id}}" method="post"  enctype="multipart/form-data">
                            {{csrf_field()}}
                            <label for="title" class="input-group">
                                Название:
                                <textarea name="title" cols="100" rows="1">{{$article->title}}</textarea>
                            </label>
                            <label for="text" class="input-group">
                                Содержание:
                                <textarea name="text" cols="100" rows="10">{{$article->text}}</textarea>
                            </label>
                            <label for="photo" class="input-group">
                                Фото:
                                <img src="/img/news/{{$article->photo}}" style="max-width: 200px;max-height: 200px;"/>
                                <input type="file" name="photo">
                            </label>
                            <input type="submit" class="btn" value="Сохранить">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection