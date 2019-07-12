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
                        <th>EMail</th>
                        <th>Verified</th>
                        <th>Roles</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>EMail</th>
                        <th>Verified</th>
                        <th>Roles</th>
                        {{-- <th>Password</th> --}}
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @if(!empty($data))
                    @foreach ($data as $record)
                    <tr>
                        <td>{{ $record->name }}</td>
                        <td>{{ $record->email }}</td>
                        <td>
                            @if($record->verified == "")
                            <span class="verified_not">{{"Not Verified"}}</span>
                            @else
                            <span class="verified">{{"Verified"}}</span>
                            @endif
                        </td>
                        <td>
                            @if(!empty($record->getRoleNames()))
                            @foreach($record->getRoleNames() as $v)
                            <label class="badge badge-success"><?php $role = $v ?>{{ $v }}</label>
                            @endforeach
                            @endif
                        </td>
                        {{-- <td>{{ Hash::make($record->password) }}</td> --}}
                        <td>{{ $record->created_at }}</td>
                        <td>
                            {{-- @if($role != 'super-admin') --}}
                            <div class="btn-group" role="group" aria-label="Basic example">
                                @can('user-edit')
                                <a href="{{ route('users.edit',[$record->id]) }}" class="btn btn-circle btn-info" >
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                @endcan
                                @can('user-delete')
                                <a href="{{ route('users.edit',[$record->id]) }}" class="btn btn-circle btn-danger " onclick="event.preventDefault();
                                    document.getElementById('delete-user-form').submit();">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                                @endcan
                            </div>
                            <form id="delete-user-form" action="{{ route('users.destroy',[$record->id]) }}" method="POST" style="display: none;">
                                @method('DELETE')
                                @csrf
                            </form>
                            {{-- @endif --}}
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
