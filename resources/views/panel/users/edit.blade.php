@extends('layouts.app')

@section('title', 'Edit user')

@push('styles')
@endpush

@section('content')
    <div class="page-heading">
        <h3>Edit user: {{ $user->name }}</h3>
        <p class="text-subtitle text-muted"><a href="{{ route('users.index') }}" style="text-decoration: none"><i class="fas fa-backspace"></i> Back</a></p>
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
                            <form class="form" action="{{ route('users.update', $user->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" class="form-control" required value="{{ $user->name }}"
                                                placeholder="Name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" class="form-control" required value="{{ $user->email }}"
                                                name="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-select" id="status" name="status" required>
                                                <option value="">Select Status</option>
                                                <option value="active" {{ $user->status === 'active' ? 'selected' : '' }}>Active</option>
                                                <option value="inactive" {{ $user->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="role">Role</label>
                                            <select class="form-select" id="role" name="role" required>
                                                <option value="">Select Role</option>
                                                <option value="admin" {{ $user->is_admin === 1 ? 'selected' : '' }}>Admin</option>
                                                <option value="user" {{ $user->is_admin === 0 ? 'selected' : '' }}>User</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" id="password" class="form-control"
                                                name="password" placeholder="Password">
                                            <small class="form-text text-muted">Leave blank if you don't want to change the password</small>
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
