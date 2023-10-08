

@extends('layouts.admin.base')
@section('content')

<div class="col-md-12">
    <h1>Заказы</h1>
    <table class="table" >
        <tbody>
            <tr>
                <th>
                    Вид
                </th>
                <th>
                    #
                </th>
                <th>
                    Код
                </th>
                <th>
                    Названия
                </th>
                <th>
                    Действия
                </th>

            </tr>
            @foreach($categories as $category)
            <tr>
                <td>
                    <div><img src="{{Storage::url($category->image)}}"
                        height="50px">
                        </div>
                </td>
                <td>
                   {{$category->id}}
                </td>
                <td>
                    {{$category->code}}
                </td>
                <td>
                    {{$category->title}}
                </td>
                <td>
                    <div class="btn-group" role="group" >
                        <x-form action="{{route('admin.categories.destroy', $category) }}" method="post">
                            <a href="{{route('admin.categories.show', $category->id)}}" class="btn btn-success" type="button">Открыть</a>
                            <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-warning" type="button">Редактировать</a>
                            {{-- <input type="hidden" name="token" value=""> --}}
                            @method('DELETE')
                            {{-- <input type="hidden" name="method" value="DELETE"> --}}
                            <input type="submit" class="btn btn-danger" value="Удалить">
                        </x-form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('admin.categories.create')}}" class="btn btn-success" type="button">Добавить категорию</a>
</div>

{{$categories->links()}}

@endsection
