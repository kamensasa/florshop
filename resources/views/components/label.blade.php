@props(['required' => false])

<label mb-2 {{$attributes->class([
($required ? 'required' : ''),
]) }}>
    {{ $slot }}
</label>
