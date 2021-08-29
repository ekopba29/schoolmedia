<x-admin-layout>
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Perbarui Profil Sekolah</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('profile_school.update', ['profile_school' => $profileSchool->id]) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Nama Sekolah</label>
                            <input type="text" name="name" class="form-control" value="{{ $profileSchool->name }}">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="address"
                                rows="3">{{ $profileSchool->address }}</textarea>
                        </div>
                    </div>
                    <input type="submit" class="btn m-3 btn-primary">
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</x-admin-layout>
