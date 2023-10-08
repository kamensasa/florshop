@extends('layouts.admin.base')

@section('content')

<div class="col-md-12">
    @isset($category)
        <h1>Редактировать Категорию <b>{{ $category->title }}</b></h1>
            @else
                <h1>Добавить Категорию</h1>
            @endisset

            <form method="POST" enctype="multipart/form-data"
                  @isset($category)
                  action="{{ route('admin.categories.update', $category) }}"
                  @else
                  action="{{ route('admin.categories.store') }}"
                @endisset
            >
                <div>
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
                                   value="{{ old('code', isset($category) ? $category->code : null) }}">
                        </div>
                    </div>
                    <br>
                    <div class="input-group row">
                        <label for="title" class="col-sm-2 col-form-label">Название: </label>
                        <div class="col-sm-6">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" class="form-control" name="title" id="title"
                                   value="@isset($category){{ $category->title }}@endisset">
                        </div>
                    </div>


                        <br>
                    <div class="input-group row">
                        <label for="content" class="col-sm-2 col-form-label">Описание: </label>
                        <div class="col-sm-6">
                            @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        <textarea name="content" id="content" cols="72"
                                  rows="7">@isset($category){{ $category->content }}@endisset</textarea>
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
                        <textarea name="category_id" id="category_id" cols="72"
                                  rows="7">@isset($category){{ $category->id }}@endisset</textarea>
                        </div>
                    </div>
                    <br>


                    <div class="input-group row">
                        <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                        <div class="col-sm-10">
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label class="btn btn-default btn-file">
                                Загрузить <input type="file" style="display: none;" name="image" id="image">
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-success">Сохранить</button>
                </div>
            </form>
</div>
@endsection
