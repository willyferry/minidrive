@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('/vendors/simple-datatables/style.css') }}">
@endpush

@section('content')
    <div class="page-heading">
        <h3>All Files</h3>
        <p class="text-subtitle text-muted">All of site files</p>
    </div>

    <div class="my-4">
        @include('layouts.partials.alerts')
    </div>

    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>
                                    Name <br/>
                                    <small class="text-muted" style="font-size:11px">Author</small>
                                </th>
                                <th>Detail</th>
                                <th>Upload Date</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-dark">
                            @if ($files->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center">No data available</td>
                                </tr>
                            @else
                                @foreach ($files as $file)
                                    <tr>
                                        <td>
                                            {{ $file->name }} <br/>
                                            <small class="text-muted" style="font-size:11px">{{ $file->user->name }}</small>
                                        </td>
                                        <td>
                                            Password: {{ @$file->password ?: '-' }} <br/>
                                            <small class="text-muted" style="font-size:11px">{{ $file->is_public ? 'Public' : 'Private' }}</small>
                                        </td>
                                        <td>{{ $file->created_at->format('d M Y H:i') }}</td>
                                        <td class="text-end">
                                            <a href="" class="btn btn-sm btn-info">View</a>
                                            <a onclick="confirmDelete('{{ route('files.destroy', $file->id) }}')" class="btn btn-sm btn-danger">Delete</a>
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
