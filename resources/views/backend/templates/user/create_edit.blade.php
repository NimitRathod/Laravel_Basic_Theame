@extends('backend.layout.app')
@section('title') -
<?php
$title = ucfirst(explode(".",Request::route()->getName())[0]); ?>
@endsection

@section('styleFile')
<!-- Custom styles for this page -->
<link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

{{-- style code --}}
@section('style')
<style>
    .verified_not{
        color : red;
    }
    .verified{
        color : green;
    }
</style>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div> --}}

    <div class="row">

        <div class="col-xl-12 col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ !empty($user) ? 'Edit' : 'Create'  }} {{ $title }}</h6>
                </div>
                <div class="card-body">
                <form action="{{ !empty($user) ? route('users.update',[$user->id]) : route('users.store')  }}" method="POST">
                        {{ !empty($user) ? @method('PUT') : '' }}
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                            <input type="name" class="form-control" id="exampleInputEmail" placeholder="Enter User Name" value="{{ !empty($user) ? $user->name : ''  }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="exampleInputEmail" placeholder="Enter Email Address..." value="{{ !empty($user) ? $user->email : ''  }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Role of User</label>
                            <div class="col-sm-10">
                                <select class="form-control">
                                    @foreach ($roles as $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-3 offset-md-4">
                                <a href="#" class="btn btn-primary btn-user btn-block">
                                        {{ !empty($user) ? 'Update' : 'Submit' }}
                                </a>
                            </div>
                            <div class="col-md-3">
                            <a href="{{ route('users.index') }}" class="btn btn-danger btn-user btn-block">
                                    Cancel
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection

@section('scriptFile')
{{-- Data Table js --}}
<script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('backend/js/demo/datatables-demo.js') }}"></script>
@endsection

@section('footerScript')

@endsection
