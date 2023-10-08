@props(['post' => null])

<x-errors></x-errors>

<x-form {{ $attributes }}>





    <x-form-item>

        <x-label required>{{__('Название поста')}}</x-label>

        <x-input name="title" autofocus/>

        <x-error name='account'/>
        <x-error name='title'/>

    </x-form-item>

    <x-form-item>

    </x-form-item>


    <x-form-item>

        <x-label required>{{__('Содержание поста')}}</x-label>

        {{$slot}}

        <x-error name='content'/>

    </x-form-item>

    <x-form-item>

        <x-label required>{{__('Код')}}</x-label>

        <x-input name="code" autofocus/>

        <x-error name='code'/>


    </x-form-item>



    <x-form-item>

        <x-label required>{{__('Дата публикации')}}</x-label>

        <x-input name="published_at" placeholder="dd.mm.yyyy" />

        <x-error name='published_at'/>

    </x-form-item>

    <x-form-item>

       <x-checkbox name="published">
        Опубликовано
       </x-checkbox>

    </x-form-item>


    <x-button type="submit">
        @isset($buttontext)
            {{$buttontext}}
        @endisset
    </x-button>

</x-form>
