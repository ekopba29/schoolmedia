<x-admin-layout>
    <x-auth-validation-errors :errors="$errors" />

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">{{ isset($student) ? 'Perbarui Murid' : 'Buat Murid' }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">


            @if (isset($student))
                <form action="{{ route('students.update', ['student' => $student->id]) }}" method="POST">
                    @method('PATCH')
                @else
                    <form action="{{ route('students.store') }}" method="POST">
            @endif

            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" value="@if(isset($student)) { $student->user->name} @endif">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control"
                            value="@if(isset($student)) { $student->user->email } @endif">
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="student_class_id" class="form-control">
                            @foreach (\App\Models\StudentClass::get() as $class)
                                <option value="{{ $class->id }}"
                                    @if(isset($student))
                                    {{ $student->student_class_id == $class->id ? 'selected' : '' }}
                                    @endif
                                    >
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
</x-admin-layout>
