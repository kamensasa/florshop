@if($errors->any())
<ul>

<div class="alert alert-danger p-3">
    @foreach($errors->all() as $note)
<li>
    {{$note}}
</li>

@endforeach

</ul>
</div>
@endif
