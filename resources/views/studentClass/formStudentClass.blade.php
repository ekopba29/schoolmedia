<x-admin-layout>
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">{{ (isset($class)) ? "Perbarui Kelas" : "Buat Kelas" }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">


            @if (isset($class))
                <form action="{{ route('student_class.update', ['student_class' => $class->id]) }}" method="POST">
                    @method('PATCH')
                @else
                    <form action="{{ route('student_class.store') }}" method="POST">
            @endif

            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Nama Kelas</label>
                        <input type="text" name="class_name" class="form-control" value="{{ $class->class_name ?? '' }}">
                    </div>
                </div>
                <input type="submit" class="btn m-3 btn-primary">
            </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</x-admin-layout>
