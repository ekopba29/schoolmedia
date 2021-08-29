<x-admin-layout>
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Data Kelas</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="col-12 text-right">
                <a class="btn btn-default" href="{{ route('students.create') }}">Buat Murid</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Kelas</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($students as $key => $student)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $student->user->name }}</td>
                            <td>{{ $student->user->email }}</td>
                            <td>{{ $student->student_class->class_name }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-2 text-right m-1 p-0">
                                        <a class="btn btn-outline-info btn-xs"
                                            href="{{ route('students.edit', ['student' => $student->id]) }}">Ubah</a>
                                    </div>
                                    <div class="col-2 text-left m-1 p-0">
                                        <form
                                            action="{{ route('students.destroy', ['student' => $student->id]) }}"
                                            method="post">
                                            @method("DELETE")
                                            @csrf
                                            <button class="btn btn-outline-danger btn-xs" type="submit"
                                                onclick="return confirm('Yakin Hapus Kelas Ini ?');">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-12 text-right mt-4">
                {{ $students->links() }}
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</x-admin-layout>
