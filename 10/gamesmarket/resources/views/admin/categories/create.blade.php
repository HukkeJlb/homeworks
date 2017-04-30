@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Создать категорию</div>
                    <div class="panel-body">
                        <a href="/admin/categories"><< Назад</a>
                        <form action="/admin/categories/store" method="post">
                            {{csrf_field()}}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="input-group">Название:</label>
                                    <input type="text" name="name" value="{{old('name')}}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="description" class="input-group">Описание:</label>
                                <textarea name="description" cols="100" rows="10">{{old('description')}}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <input type="submit" class="btn" value="Сохранить">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection