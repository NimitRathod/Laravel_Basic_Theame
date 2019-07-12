@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>
            <i class="fa fa-thumbs-o-up"></i> Success!
        </h4>
        <p>{{ $message }}</p>
    </div>
@endif
