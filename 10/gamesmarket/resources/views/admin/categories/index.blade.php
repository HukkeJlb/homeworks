@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Категории</h3></div>
                    <div><a href="/admin/categories/create" class="btn btn-primary">Создать</a></div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                        @foreach($categories as $category)
                        <tr>
                            <td><a href="/admin/categories/show/{{$category->id}}">{{$category->name}}</a></td>
                            <td><a href="/admin/categories/edit/{{$category->id}}" class="btn">Редактировать</a></td>
                            <td>
                                <form action="/admin/categories/destroy/{{$category->id}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <input type="submit" value="Удалить">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection