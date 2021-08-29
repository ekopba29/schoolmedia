<x-admin-layout>
    <x-auth-validation-errors :errors="$errors" />

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">{{ isset($user) ? 'Perbarui Admin' : 'Buat Admin' }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">


            @if (isset($user))
                <form action="{{ route('profile_admin.update', ['profile_admin' => $user->id]) }}" method="POST">
                    @method('PATCH')
                @else
                    <form action="{{ route('profile_admin.store') }}" method="POST">
            @endif

            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control"
                            value="{{ $user->email ?? '' }}">
                    </div>
                </div>
                <input type="submit" class="btn m-3 btn-primary">
            </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</x-admin-layout>
