@extends('layouts.app')

@section('title', 'Edit file')

@push('styles')
@endpush

@section('content')
    <div class="page-heading">
        <h3>Edit file: {{ $myFile->name }}</h3>
        <p class="text-subtitle text-muted"><a href="{{ route('my-files.index') }}" style="text-decoration: none"><i class="fas fa-backspace"></i> Back</a></p>
    </div>

    <div class="my-4">
        @include('layouts.partials.alerts')
    </div>

    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{ route('my-files.update', $myFile->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" class="form-control" required value="{{ $myFile->name }}"
                                                placeholder="Name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="type">Type</label>
                                            <select class="form-select" id="type" name="type" required>
                                                <option value="">Select Type</option>
                                                <option value="public" {{ $myFile->is_public === 1 ? 'selected' : '' }}>Public</option>
                                                <option value="private" {{ $myFile->is_public === 0 ? 'selected' : '' }}>Private</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="slug">Slug</label>
                                            <input type="text" id="slug" class="form-control" required value="{{ $myFile->slug }}"
                                                placeholder="Slug" name="slug">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea type="description" id="description" class="form-control" rows="4"
                                                name="description" placeholder="Description">{{ $myFile->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="file">File</label>
                                            <input type="file" id="file" class="form-control"
                                                placeholder="File" name="file">
                                            <small class="text-muted">Current File is: <a href="{{ asset('/storage/files/' . $myFile->file_url) }}">Lihat</a></small>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="text" id="password" class="form-control"
                                                name="password" placeholder="Password">
                                            <small class="form-text text-muted">Leave blank if you don't want to set password</small>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
@endpush
