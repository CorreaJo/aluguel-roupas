@props(['errors'])

@if ($errors->any())

    <div {{ $attributes }}>
        <div class="font-medium text-red-600">
            {{ __('Algo de errado não está certo!') }}
        </div>
        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                @if ($error == 'The password confirmation does not match.')
                    @php
                        $error = 'A confirmação da senha não corresponde.';
                    @endphp
                @endif
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
