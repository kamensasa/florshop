@extends('layouts.admin.base')
@section('title', 'Создать пост')

@section('content')
eeeee
        <x-title>

            {{__('Создать пост')}}

            <x-slot name="link">
                <a href="{{route('admin.posts')}}">
                {{__('Назад')}}
                </a>
            </x-slot>

        </x-title>

       <form method="POST"  enctype="multipart/form-data" @isset($post)
       action="{{ route('admin.posts.update', $post) }}"
       @else
       action="{{ route('admin.posts.store') }}"
     @endisset>


    <br>
    @isset($category)
    @method('POST')
@endisset
@csrf
<div class="input-group row">
    <label for="code" class="col-sm-2 col-form-label">Код: </label>
    <div class="col-sm-6">
        @error('code')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" class="form-control" name="code" id="code"
               value="{{ old('code', isset($post) ? $post->code : null) }}">
    </div>
</div>
<br>

<br>
<div class="input-group row">
    <label for="category_id" class="col-sm-2 col-form-label">Категория: </label>
    <div class="col-sm-6">
        @error('category_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    <input type="text" class="form-control" name="category_id" id="category_id" cols="72"
            value="{{ old('id', isset($category) ? $post->category_id : null) }}">
    </div>
</div>
<br>

<div class="input-group row">
    <label for="title" class="col-sm-2 col-form-label">Название: </label>
    <div class="col-sm-6">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" class="form-control" name="title" id="title"
               value="@isset($post){{ $post->title }}@endisset">
    </div>
</div>

    <br>

<div class="input-group row">
    <label for="content" class="col-sm-2 col-form-label">Описание: </label>
    <div class="col-sm-6">
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    <textarea name="content" id="content" cols="72"
              rows="7">@isset($post){{ $post->content }}@endisset</textarea>
    </div>
</div>
    <br>

<div class="input-group row">
    <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
    <div class="col-sm-10">
        <label class="btn btn-default btn-file">
            Загрузить <input type="file" style="display: none;" name="image" id="image">
        </label>
    </div>
</div>
<button class="btn btn-success">Сохранить</button>
</div>

       </form>




        {{-- <x-post.form action="{{route('admin.posts.store')}}" method="post">
            <x-textarea name="content" rows="10" />
            <x-slot name="buttontext">
                {{__('Создать текст')}}
            </x-slot>

        </x-post.form> --}}



@endsection
