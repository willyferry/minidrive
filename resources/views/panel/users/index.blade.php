@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('/vendors/simple-datatables/style.css') }}">
@endpush

@section('content')
    <div class="page-heading">
        <h3>Users</h3>
        <p class="text-subtitle text-muted">All of users</p>
    </div>

    <div class="my-4">
        @include('layouts.partials.alerts')
    </div>

    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Add New
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>
                                    Name <br/>
                                    <small class="text-muted" style="font-size:11px">Email</small>
                                </th>
                                <th>Status</th>
                                <th>Role</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-dark">
                            @if ($users->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center">No data available</td>
                                </tr>
                            @else
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            {{ $user->name }} <br/>
                                            <small class="text-muted" style="font-size:11px">{{ $user->email }}</small>
                                        </td>
                                        <td>
                                            @if ($user->status === 'active')
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->is_admin === 1)
                                                <span class="badge bg-primary">Admin</span>
                                            @else
                                                <span class="badge bg-secondary">User</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <a onclick="confirmDelete('{{ route('users.destroy', $user->id) }}')" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>


    <!-- delete form -->
    <form id="delete" class="d-none" action="" method="post">
        @csrf
        @method('delete')
    </form>
@endsection

@push('scripts')
    <script src="{{ asset('/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        const confirmDelete = (url) => {
            if (confirm('Are you sure you want to delete this user?')) {
                document.querySelector('#delete').action = url;
                document.querySelector('#delete').submit();
            }
        }
    </script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
@endpush
