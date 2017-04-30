@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Создать товар</div>
                    @foreach($errors->all() as $err)
                        <li class="alert alert-danger">{{$err}}</li>
                    @endforeach
                    <div class="panel-body">
                        <a href="/admin/goods"><< Назад</a>
                        <form action="/admin/goods/store" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <label for="name" class="input-group">
                                Название:
                                <textarea name="name" cols="100" rows="1">{{old('name')}}</textarea>
                            </label>
                            <label for="name" class="input-group">
                                Категория:
                                <select name="category">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </label>
                            <label for="price" class="input-group">
                                Цена:
                                <textarea name="price" cols="100" rows="1">{{old('price')}}</textarea>
                            </label>
                            <label for="description" class="input-group">
                                Описание:
                                <textarea name="description" cols="100" rows="10">{{old('description')}}</textarea>
                            </label>
                            <label for="photo" class="input-group">
                                Фото:
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