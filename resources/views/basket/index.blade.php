@extends('layouts.base')

@section('content')

<div class="starter-template">
    <h1>Корзина</h1>
    <p>Оформление заказа</p>

@if (session()->has('success'))
<p class="alert alert-success">{{session()->get('success')}}</p>
@endif

@if (session()->has('warning'))
<p class="alert alert-warning">{{session()->get('warning')}}</p>
@endif

    <div class="panel">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>Название</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th>Стоимость</th>
                </tr>
            </thead>
            <tbody>

                <tr>

                @foreach($order->posts as $post)

                <td>
                    <a href="{{route('posts.show', [$post->id])}}">
                        <img height="56px" src="{{Storage::url($post->image)}}" >
                        {{$post->title}}
                    </a>
                </td>
                <td>
                    <span class="badge text-bg-secondary">{{$post->pivot->count}}</span>
                    <div class="btn-group form-inline">
                        <x-form action="{{route('basket.remove', $post->id)}}" method="POST">
                        <button type="submit" class="btn btn-danger" href="" > <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="tomato" class="bi bi-dash-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"/>
                      </svg> </button>
                        </x-form>

                      <x-form action="{{route('basket.add', $post->id)}}" method="POST" >
                    <button type="submit" class="btn btn-success" href="" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                      </svg> </button>
                      </x-form>
                </div>
                </td>
                <td>{{$post->price}}</td>
                <td>{{$post->getPriceForCount()}}</td>
                <td></td>

            </tr>

@endforeach

            <tr>
                <td>Общая стомиость</td>
                <td>{{$order->calculate()}}</td>
            </tr>

            </tbody>
        </table>
        <div class="btn-group pull-right" role="group">

            <a href="{{route('basket.place')}}" class="btn btn-success" type="button">Оформить заказ</a>

        </div>
    </div>
</div>

@endsection

