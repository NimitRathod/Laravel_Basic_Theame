@extends('backend.layout.app')
@section('title') -
<?php
$title = ucfirst(explode(".",Request::route()->getName())[0]); ?>
@endsection

@section('styleFile')
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
        <form class="form-horizontal" action="{{ route('roles.update',[$role->id])  }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                        <input type="name" class="form-control" name="name" placeholder="Enter User Name" value="{{ !empty($role) ? $role->name : old('name')  }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Permission:</label>
                    <div class="col-sm-10">
                        @foreach($permission as $value)
                        <input type="checkbox" name="permission[]"
                        {{ @(in_array($value->id, $rolePermissions)) ? 'checked' : '' }}
                        value={{ $value->id }} />
                        {{ $value->name }}
                        <br/>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{ route('roles.index') }}" class="btn btn-danger">
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
<div class="container-fluid">

    <!-- Page Heading -->
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div> --}}

    <div class="row">

        @include("backend.partials.form_error_alert")

        <div class="col-xl-12 col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ 'Edit' }} {{ $title }}</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('roles.update',[$role->id])  }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" name="name" placeholder="Enter User Name" value="{{ !empty($role) ? $role->name : old('name')  }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Permission:</label>
                            <div class="col-sm-10">
                                @foreach($permission as $value)
                                <input type="checkbox" name="permission[]"
                                {{ @(in_array($value->id, $rolePermissions)) ? 'checked' : '' }}
                                value={{ $value->id }} />
                                {{ $value->name }}
                                <br/>
                                @endforeach
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
                                <a href="{{ route('roles.index') }}" class="btn btn-danger btn-user btn-block">
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
@endsection

@section('footerScript')

@endsection
