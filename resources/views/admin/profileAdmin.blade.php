<x-admin-layout>
    <div class="col-12">
        <!-- Main content -->
        <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h4>
                        {{ $user->name }}
                    </h4>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <address>
                        <i class="fa fa-envelope">
                        </i>
                        &nbsp;
                        {{ $user->email }}
                    </address>
                    <a href="{{ route('profile_admin.edit', ['profile_admin' => $user->id]) }}"
                        class="btn btn-info">Ubah</a>
                </div>
            </div>
            <!-- /.invoice -->
        </div>
</x-admin-layout>
