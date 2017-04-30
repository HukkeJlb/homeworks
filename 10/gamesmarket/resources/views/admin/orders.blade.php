@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Заказы</h3></div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <th>Наименование товара</th>
                            <th>Цена</th>
                            <th>Id покупателя</th>
                            <th>Имя покупателя</th>
                            <th>Электронная почта</th>
                            <th>Сформирован заказ</th>
                            @foreach($orders as $order)
                                <tr>
                                    <td width="20%">{{$order->good->name}} </td>
                                    <td width="10%">{{$order->price}} руб </td>
                                    <td width="10%">{{$order->user_id}} </td>
                                    <td width="20%">{{$order->user_name}} </td>
                                    <td width="20%">{{$order->email}} </td>
                                    <td width="20%">{{$order->created_at}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection