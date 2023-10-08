@extends('layouts.admin.base')
@section('title', 'Мои посты')
@section('content')
ssss
        <x-title>
            {{__('Просмотр поста')}}

            <x-slot name="link">
                <a href="{{route('admin.posts')}}">
                {{__('Назад')}}
                </a>
            </x-slot>

            <x-slot name="right">
                <x-button-link href="{{route('admin.posts.edit', $post->id)}}">
                   {{__('Изменить')}}
                </x-button-link>
        </x-slot>

        </x-title>

        <div><img src="{{Storage::url($post->image)}}"
            height="240px"></div>

            <h2 class="h4 m-0">
                {{$post->title}}
                </a>
            </h2>

            <div class="small text-muted">
                {{ now()->format('d.m.Y H:i:s')}}
            </div>

            <div class="pt-3">
                {!! $post->content !!}
            </div>



@endsection
