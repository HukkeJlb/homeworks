@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Статьи</h3></div>
                    <div><a href="/admin/articles/create" class="btn btn-primary">Создать</a></div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                        @foreach($articles as $article)
                        <tr>
                            <td><a href="/admin/articles/show/{{$article->id}}">{{$article->title}}</a></td>
                            <td><a href="/admin/articles/edit/{{$article->id}}" class="btn">Редактировать</a></td>
                            <td>
                                <form action="/admin/articles/destroy/{{$article->id}}" method="post">
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