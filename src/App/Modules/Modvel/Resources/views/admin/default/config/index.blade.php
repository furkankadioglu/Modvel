@extends('masters.admin')

@section('breadcrumb')
{{ $headName }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ url('assets/admin/js/plugins/datatables/jquery.dataTables.min.css') }}">
@endsection

@section('scripts')
<script src="{{ url('assets/admin/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('assets/admin/js/pages/base_tables_datatables.js') }}"></script>
@endsection

@section('modals')

@endsection


@section('content')
<form action="{{ url('/admin/modules/Modvel/config') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="block block-bordered">
    <div class="block-header bg-gray-lighter">
   	 	<ul class="block-options">
        </ul>
        <h3 class="block-title"><i class="fa fa-tasks"></i> {{ $headName }}</h3>
    </div>
   <div class="block-content push-10-t form-horizontal">
 
      <div class="row push-10-t">
      <div class="col-md-8 col-md-offset-2">
      @if($datas == "[]")
      No data.
      <br><br>  
      @else
        @foreach($datas as $k => $v)
        @if(!is_array($v))
        <div class="form-group">
                <div class="form-material floating">
                    <input class="form-control" id="material-text2" name="base[{{ $k }}]" value="{{ $v }}" type="text">
                    <label for="material-text2">{{ $k }}</label>
                </div>
        </div>
        @endif
        @endforeach
      @endif

      
      </div>
      </div>
    </div>
</div>

<div class="block block-bordered">
  <div class="block-content">
    <div class="form-group">
      <div class="col-sm-12 text-center">
          <button class="btn btn-sm btn-primary" type="submit">Save</button>
      </div>
      <br><br>
    </div>
  </div>
</div>

</form>

@endsection
