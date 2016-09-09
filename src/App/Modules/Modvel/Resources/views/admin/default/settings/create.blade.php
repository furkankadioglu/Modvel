@extends('masters.admin')

@section('breadcrumb')
{{ $headName }}
@endsection

@section('styles')
@endsection

@section('scripts')
@endsection


@section('content')
<form action="{{ url('/admin/modules/Modvel/settings') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<input type="hidden" name="postCategory" value="create">
<div class="block block-bordered">
    <div class="block-header bg-gray-lighter">
   	 	<ul class="block-options">
           @include('Modvel::admin.settingsNavigation')
        </ul>
        <h3 class="block-title"><i class="fa fa-plus"></i> {{ $headName }} CREATE</h3>
    </div>
    <div class="block-content push-10-t form-horizontal">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row push-10-t">
            <div class="col-md-8 col-md-offset-2">
	            <div class="form-group">
	                    <div class="form-material floating">
	                        <input class="form-control" id="material-text2" name="name" type="text">
	                        <label for="material-text2">Setting Name</label>
	                    </div>
	            </div>
	            <div class="form-group">
	                    <div class="form-material floating">
	                        <input class="form-control" id="material-password2" name="displayName" type="text">
	                        <label for="material-password2">Setting Display Name</label>
	                    </div>
	            </div>
             	<div class="form-group">
                        <div class="form-material floating">
                            <select class="js-select2 form-control" id="example2-select2-multiple" name="attribute">
                            	<option></option>
                                <option value="No Rule">No Rule</option>
                                <option value="Numeric">Numeric</option>
                                <option value="Alphabetic">Alphabetic</option>
                            </select>
                            <label for="example2-select2">Setting Attribute</label>
                        </div>
                </div>
	         </div>
            </div>
            <br>
        
    </div>
</div>

<div class="block block-bordered">
	<div class="block-content">
		<div class="form-group">
	    <div class="col-sm-12 text-center">
	        <button class="btn btn-sm btn-primary" type="submit">Submit</button>
	    </div>
	    <br><br>
		</div>
	</div>
</div>

</form>
@endsection