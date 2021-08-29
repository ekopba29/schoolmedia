<x-guest-layout>
    <x-auth-card>
    <x-slot name="logo">
    </x-slot>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="input-group mb-3">
                <label class="col-12">Nama</label>
                <input id="name" class="form-control" type="text" name="name" :value="old('name')" required
                autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <label class="col-12">Email</label>
                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <label class="col-12">Password</label>
                <input id="password" class="form-control" type="password" name="password" required
                autocomplete="new-password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <label class="col-12">Confirm Password</label>
                <input id="password_confirmation" class="form-control" type="password_confirmation" name="password_confirmation" required
                autocomplete="new-password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-12">Kelas</label>
                <select name="student_class_id" class="form-control">
                    @foreach (\App\Models\StudentClass::get() as $class)
                        <option value="{{ $class->id }}">
                            {{ $class->class_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <!-- /.col -->
                {{-- @if (Route::has('password.request'))
                    <div class="col-12 text-right mt-3 mb-0">
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    </div>
                @endif --}}
            </div>
        </form>
    </div>

    </x-auth-card>
</x-guest-layout>
