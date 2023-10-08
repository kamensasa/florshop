@extends('layouts.admin.base')



@section('content')

<div class="col-md-12">
    <h1>{{$category->title}}</h1>
    <table class="table">
        <tbody>
        <tr>
            <th>
                Поле
            </th>
            <th>
                Значение
            </th>
        </tr>
        <tr>
            <td>ID</td>
            <td>{{ $category->id }}</td>
        </tr>
        <tr>
            <td>Код</td>
            <td>{{ $category->code }}</td>
        </tr>
        <tr>
            <td>Название</td>
            <td>{{ $category->title }}</td>
        </tr>
        <tr>
            <td>Описание</td>
            <td>{{ $category->content }}</td>
        </tr>
        <tr>
            <td>Картинка</td>
            <td><img src="{{Storage::url($category->image)}}"
                     height="240px"></td>
        </tr>
        <tr>
            <td>Кол-во товаров</td>
            <td>{{ $category->posts->count() }}</td>
        </tr>
        </tbody>
    </table>
</div>
@endsection
