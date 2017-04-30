@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Товары</h3></div>
                    <div><a href="/admin/goods/create" class="btn btn-primary">Создать</a></div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                        @foreach($goods as $good)
                        <tr>
                            <td><a href="/admin/goods/show/{{$good->id}}">{{$good->name}}</a></td>
                            <td><a href="/admin/goods/edit/{{$good->id}}" class="btn">Редактировать</a></td>
                            <td>
                                <form action="/admin/goods/destroy/{{$good->id}}" method="post">
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