@extends('layouts.base')



@section('content')


<x-form action="{{route('register.store')}}" method="POST" >
    <div>
        <p>Введите ваши данные</p>

        <div class="container">
            <div class="form-group">
                <label for="name" class="control-label col-lg-offset-3 col-lg-2" >Имя</label>
                <div class="col-lg-4">
                    <input type="text" name="name" id="name" value="" class="form-control">
                </div>
            </div>
            <br>
            <br>

            <div class="form-group">
                <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Телефон</label>
                <div class="col-lg-4">
                    <input type="text" name="phone" value="" class="form-control">
                </div>
            </div>
            <br>
            <br>
            <div class="form-group">
                <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Пароль</label>
                <div class="col-lg-4">
                    <input type="text" name="password" value="" class="form-control">
                </div>
            </div>

            <br>
            <div class="form-group">
                <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Подтвердите пароль</label>
                <div class="col-lg-4">
                    <input type="text" name="password" value="" class="form-control">
                </div>
            </div>
        </div>
        <br>
        <input type="submit" class="btn btn-success" value="Регистрация">
    </div>
</x-form>

@endsection
