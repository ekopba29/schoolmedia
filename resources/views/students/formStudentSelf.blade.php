<x-student-layout>
    <x-auth-validation-errors :errors="$errors" />

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">{{ isset($student) ? 'Perbarui Profil' : 'Buat Murid' }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <form action="{{ route('profile_murid.update', ['profile_murid' => $student->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ $student->user->name ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control"
                                value="{{ $student->user->email ?? '' }}">
                        </div>
                        <div class="form-group d-none">
                            <label>Kelas</label>
                            <select name="student_class_id" class="form-control">
                                @foreach (\App\Models\StudentClass::get() as $class)
                                    <option value="{{ $class->id }}"
                                        {{ $student->student_class_id == $class->id ? 'selected' : '' }}>
                                        {{ $class->class_name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <input type="submit" class="btn m-3 btn-primary">
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</x-student-layout>
