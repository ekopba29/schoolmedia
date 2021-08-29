@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="text-red h4 text-center">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="text-red">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
