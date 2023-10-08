@extends('layouts.base')



@section('content')

@if (session()->has('success'))
<p class="alert alert-success">{{session()->get('success')}}</p>
@endif

@if (session()->has('warning'))
<p class="alert alert-warning">{{session()->get('warning')}}</p>
@endif

<x-title>

    {{__('Товары')}}


    <x-slot name="right">




    </x-slot>

</x-title>

@foreach ($posts as $post)

<div><img src="{{Storage::url($post->image)}}"
    height="240px"></div>

<h5>
    <a href="{{route('posts.show', $post->id)}}">
        {{$post->title}}
    </a>
</h5>

<div class="small text-muted">
    {{now()->format('d.m.Y. H:i:s')}}
</div>



@endforeach


<div class="links">
    {{$posts->links()}}
    </div>

@endsection
