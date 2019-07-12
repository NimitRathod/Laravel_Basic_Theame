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
        <form class="form-horizontal" action="{{ route('roles.store')  }}" method="POST" enctype="multipart/form-data">
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
                        <input type="checkbox" class="icheckbox_minimal-blue" name="permission[]"
                        value={{ $value->id }} />{{ $value->name }}
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
@endsection

@section('scriptFile')
@endsection

@section('footerScript')

@endsection
