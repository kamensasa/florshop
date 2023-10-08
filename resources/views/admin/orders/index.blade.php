@extends('layouts.admin.base')

@section('content')

<div class="col-md-12">
    <h1>Заказы</h1>
    <table class="table">
        <tbody>

            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Когда отправлен</th>
                <th>Сумма заказа</th>
                <th>Действия</th>
            </tr>
            @foreach($orders as $order)
            <tr>
                <th>{{$order->id}}</th>
                <th>{{$order->name}}</th>
                <th>{{$order->phone}}</th>
                <th>{{$order->created_at}}</th>
                <th>{{$order->calculate()}} руб.</th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
