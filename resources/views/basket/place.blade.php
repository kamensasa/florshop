@extends('layouts.base')

@section('content')

@guest
<div class="starter-template">
    <h1>Подтвердите заказ</h1>
    <div class="container">
        <div class="row justify-content-center">
            <p>Общая стоимость заказа: <b> {{$order->calculate()}} </b> </p>
            <x-form action="{{route('basket.confirm')}}" method="POST" >
                <div>
                    <p>Укажите имя и номер своего телефона, чтобы менеджер связался с Вами</p>

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
                            <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Номер телефона</label>
                            <div class="col-lg-4">
                                <input type="text" name="phone" value="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success" value="Подтвердить заказ">
                </div>
            </x-form>
        </div>
    </div>
</div>
@endguest

@auth

@endauth


@endsection
