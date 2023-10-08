@extends('layouts.admin.base')



@section('content')

@if (session()->has('success'))
<p class="alert alert-success">{{session()->get('success')}}</p>
@endif

@if (session()->has('warning'))
<p class="alert alert-warning">{{session()->get('warning')}}</p>
@endif

<x-title>

    {{__('Список постов')}}


    <x-slot name="right">


        <x-button-link href="{{route('admin.posts.create')}}">
            {{__('Создать')}}
        </x-button-link>

    </x-slot>

</x-title>

<form action="{{route('admin.posts')}}" method="GET" >
<div class="filters row">

        <label for="price_from" class="col-3"> Цена от
            <input type="text" name="price_from" id="price_from" class="col-12 col-lg-6 col-md-6"  value="{{request()->price_from}}">
        </label>


        <label for="price_to" class="col-3" > до
            <input type="text" name="price_to" id="price_to" value="{{request()->price_to}}" class="col-12 col-lg-6 col-md-6">
        </label>

        <div class="col-3">
            <button type="submit" class="btn btn-danger col-12 col-lg-6 col-md-6">Фильтр</button>
        </div>

        <div class="col-3">
            <a href="{{route('admin.posts')}}" class="btn btn-warning col-12 col-lg-6 col-md-6">Сброс</a>
        </div>

    </div>

</form>

@foreach ($posts as $post)


<h5>
    <a href="{{route('admin.posts.show', $post->id)}}">
        {{$post->title}}
    </a>
</h5>

<div class="small text-muted">
    {{now()->format('d.m.Y. H:i:s')}}
</div>


<div><img src="{{Storage::url($post->image)}}"
height="240px">
</div>

<div>
    <h5>
        {{$post->price}} руб.
    </h5>
</div>





@endforeach
<div class="links">
{{$posts->links()}}
</div>


@endsection
