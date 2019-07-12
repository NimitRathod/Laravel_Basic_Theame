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
<!-- Content Header (Page header) -->
<section class="content-header">
    @include("backend.partials.form_error_alert")
</section>

<!-- Main content -->
<section class="content">

    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{  'Create'  }} {{ $title }}</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('users.update',[$user->id])  }}" method="POST">
            @method('PUT')
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                        <input type="name" class="form-control" id="name" name="name" placeholder="Enter User Name" value="{{ !empty($user) ? $user->name : old('name')  }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" placeholder="Enter Email Address..." value="{{ !empty($user) ? $user->email : old('email')  }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="roles" class="col-sm-2 control-label">Role of User</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="roles">
                            @foreach ($roles as $role)
                            <option value="{{ $role }}">{{ $role }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{ route('users.index') }}" class="btn btn-danger">
                    Cancel
                </a>
                <button class="btn btn-primary pull-right">
                    {{ 'Submit' }}
                </button>
            </div>

        </form>
    </div>

</section>
<!-- /.content -->


<!-- Begin Page Content -->
{{-- <div class="container-fluid">

    <div class="row">


        <div class="col-xl-12 col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ 'Edit' }} {{ $title }}</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update',[$user->id])  }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="name" name="name" class="form-control" placeholder="Enter User Name" value="{{ !empty($user) ? $user->name : ''  }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" placeholder="Enter Email Address..." value="{{ !empty($user) ? $user->email : ''  }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Role of User</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="roles">
                                    @foreach ($roles as $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-3 offset-md-4">
                                <Button type="submit" class="btn btn-primary btn-user btn-block">
                                    Update
                                </Button>
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
</div> --}}
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
