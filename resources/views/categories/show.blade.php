@extends('layouts.base')



@section('content')

<x-title>
    {{$category->title}}

    {{-- <x-slot name="right">

        <x-button-link href="{{route('posts.create')}}">
            {{__('Создать')}}
        </x-button-link>

    </x-slot> --}}

</x-title>

@foreach ($category->posts as $post)


<h5>
    <a href="{{route('posts.show', $post->id)}}">
        {{$post->title}}
    </a>
</h5>

<div class="small text-muted">
    {{now()->format('d.m.Y. H:i:s')}}
</div>



@endforeach

@endsection
