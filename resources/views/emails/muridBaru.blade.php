@component('mail::message')
    Hi {{ $siswa->name }},
    <p>
        Terimakasih Telah Mendaftar dikelas
        <b>
            {{ $siswa->student->student_class->class_name }}
        </b>
    </p>
    {{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

    Thanks,
    <p>
        {{ config('app.name') }}
    </p>
@endcomponent
