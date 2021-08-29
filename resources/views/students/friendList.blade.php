<x-student-layout>
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Teman Sekelas</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Kelas</th>
                </thead>
                <tbody>
                    @foreach ($students as $key => $student)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $student->user->name }}</td>
                            <td>{{ $student->user->email }}</td>
                            <td>{{ $student->student_class->class_name }}</td>
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
</x-student-layout>
