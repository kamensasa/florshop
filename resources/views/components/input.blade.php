<input {{$attributes->class([
'form-control'
])->merge([
    'value' => request()->old($attributes->get('name')),
]) }}>
