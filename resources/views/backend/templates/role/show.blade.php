@extends('backend.layout.app')
@section('title') -
<?php echo
$title = ucfirst(explode(".",Request::route()->getName())[0]); ?>
@endsection

@section('styleFile')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
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

<section class="content-header">
    @include("backend.partials.success_form_create")
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $title }} List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Guard Name</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Guard Name</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @if(!empty($data))
                    @foreach ($data as $record)
                    <tr>
                        <td>{{ $record->name }}</td>
                        <td>{{ $record->guard_name }}</td>
                        <td>{{ $record->created_at }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                @can('role-edit')
                                <a href="{{ route('roles.edit',[$record->id]) }}" class="btn btn-circle btn-info ">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                @endcan

                                @if($record->name != 'super-admin')
                                @can('role-delete')
                                <form id="delete-role-form" action="{{ route('roles.destroy',[$record->id]) }}" method="POST" class="btn btn-circle btn-danger">
                                    @method('DELETE')
                                    @csrf
                                    <a class="btn btn-circle btn-danger btn-xs" >
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                </form>
                                @endcan
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

</section>
<!-- /.content -->
@endsection

@section('scriptFile')
<!-- DataTables -->
<script src="{{ asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('backend/bower_components/fastclick/lib/fastclick.js') }}"></script>
@endsection

@section('script')
<!-- page script -->
<script>
    $(function () {
        $('#datatable').DataTable({
            'autoWidth'   : true
        })
    })
</script>
@endsection
