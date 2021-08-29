<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors :errors="$errors" />

        <!-- /.login-logo -->
        <div class="card-body login-card-body text-center">
            @auth
                @if (auth()->user()->role == 'admin')
                    <a href="{{ route('students.index') }}" class="btn btn-info">Daftar Siswa</a>
                    @endif
                    <a href="{{ route('murid.index') }}" class="btn btn-warning">Teman Sekelas</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-default">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 btn btn-warning">Register</a>
                @endif
            @endauth
        </div>
        <!-- /.login-card-body -->
    </x-auth-card>
</x-guest-layout>
