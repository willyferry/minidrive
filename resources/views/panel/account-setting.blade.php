@extends('layouts.app')

@section('title', 'Account Setting')

@push('styles')
@endpush

@section('content')
    <div class="page-heading">
        <h3>Account Setting</h3>
        <p class="text-subtitle text-muted">Setting your account here</p>
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
                            <form class="form" action="{{ route('account-setting.update') }}" method="post">
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
                                            <input type="email" id="email" class="form-control" value="{{ $user->email }}" disabled placeholder="Email">
                                            <small class="form-text text-muted">Cannot change email, please contact admin</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="password">New Password</label>
                                            <input type="password" id="password" class="form-control"
                                                name="password" placeholder="Password">
                                            <small class="form-text text-muted">Leave blank if you don't want to change to new password</small>
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
