<div class="card-body">

 <div class="d-flex justify-content-between">
    {{ $slot }}

    @if(isset($right))

<div>
    {{$right}}
</div>
    @endif
</div>

</div>
