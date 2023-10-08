@extends('layouts.base')
@section('content')

<div class="col-md-12">


            @foreach($categories as $category)

    <div class="d-flex flex-column align-items-start ">



    <div class="btn-group p-2" role="group" >

        <div class="d-flex flex-column align-items-start ">

                <div class="p-2">
                {{$category->title}}
                </div>

                <div p-2 m-2>
                    <img src="{{Storage::url($category->image)}}"
                height="100px">
               </div>

               <div class="p-2 m-3">
                <a href="{{route('categories.show', $category->id)}}" class="btn btn-success" type="button">Открыть</a>
            </div>

        </div>
    </div>

    </div>
            @endforeach

    {{-- <a href="{{route('admin.categories.create')}}" class="btn btn-success" type="button">Добавить категорию</a> --}}
</div>

@endsection

