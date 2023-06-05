@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ config('app.name') }}
        @endcomponent
    @endslot

    {{-- Body --}}
    <img src="https://lh3.googleusercontent.com/drive-viewer/AFGJ81r61B-dlrKIcJ0LLf3t6eYT-sy3I0BLR0vgNTKVGnBwqlx3um42-AumIB39JxXdrFJgFSd2EACl3Kvd3OjSplR31v1w=s1600" />

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
        @endcomponent
    @endslot
@endcomponent
