@extends('backend.layout.app')
@section('title') -
<?php
$title = ucfirst(explode(".",Request::route()->getName())[0]); ?>
@endsection

@section('styleFile')
@endsection

{{-- style code --}}
@section('style')
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
        <form class="form-horizontal" action="{{ route('users.store')  }}" method="POST">
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

@endsection

@section('scriptFile')

@endsection

@section('footerScript')

@endsection
