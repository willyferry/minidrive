@extends('layouts.app')

@section('title', 'My Files')

@push('styles')
    <link rel="stylesheet" href="{{ asset('/vendors/simple-datatables/style.css') }}">
@endpush

@section('content')
    <div class="page-heading">
        <h3>My Files</h3>
        <p class="text-subtitle text-muted">All of my files</p>
    </div>

    <div class="my-4">
        @include('layouts.partials.alerts')
    </div>

    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('my-files.create') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Add New
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>
                                    Name <br/>
                                    <small class="text-muted" style="font-size:11px">Public or Private</small>
                                </th>
                                <th>Password</th>
                                <th>Upload Date</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-dark">
                            @if ($myFiles->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center">No data available</td>
                                </tr>
                            @else
                                @foreach ($myFiles as $myFile)
                                    <tr>
                                        <td>
                                            {{ $myFile->name }} <br/>
                                            <small class="text-muted" style="font-size:11px">{{ $myFile->is_public === 1 ? 'Public' : 'Private' }}</small>
                                        </td>
                                        <td>
                                            {{ @$myFile->password ?: '-' }}
                                        </td>
                                        <td>{{ $file->created_at->format('d M Y H:i') }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('my-files.edit', $myFile->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="" class="btn btn-sm btn-info">View</a>
                                            <a onclick="confirmDelete('{{ route('my-files.destroy', $myFile->id) }}')" class="btn btn-sm btn-danger">Delete</a>
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
