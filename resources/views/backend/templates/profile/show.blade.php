@extends('backend.layout.app')
@section('title') -
<?php echo $title = ucfirst(explode(".",Request::route()->getName())[0]);  ?>
@endsection

@section('styleFile')
<!-- Custom styles for this page -->
<link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

{{-- style code --}}
@section('style')
<style>

</style>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">

        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between border-bottom-primary">
                    <h6 class="m-0 font-weight-bold text-primary"> {{ $title }}  {{ Auth::user()->name }}</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img class="img-profile" src="https://via.placeholder.com/250x300?text=Profile+Image+Here" >
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 > {{ Auth::user()->name }} </h4>
                                </div>
                                <div class="col-md-12">
                                    @if(!empty(Auth::user()->getRoleNames()))
                                    @foreach(Auth::user()->getRoleNames() as $v)
                                    <label class="badge badge-info">
                                        {{ strtoupper($v) }}
                                    </label>
                                    @endforeach
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <span> {{ Auth::user()->email }} </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            last
                        </div>
                    </div>
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
<script>
    /****************************************
    *       Basic Table                   *
    ****************************************/
    $(document).ready(function(){
        $('#this_dataTable').DataTable({
            "order" : [[0 , 'desc']]
        });
    });
</script>
@endsection
