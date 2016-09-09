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
<div class="block block-bordered">
    <div class="block-header bg-gray-lighter">
   	 	<ul class="block-options">
           @include('Modvel::admin.informationsNavigation')
        </ul>
        <h3 class="block-title"><i class="fa fa-tasks"></i> {{ $headName }} FILES</h3>
    </div>
   <div class="block-content push-10-t form-horizontal">
      <div class="row">
         <div class="col-md-4">
          <a class="block block-link-hover2 text-center" href="{{ url('/admin/modules/Modvel/files/photos')}}">
              <div class="block-content block-content-full bg-primary">
                  <i class=" fa-4x fa fa-picture-o fa-align-justify text-white"></i>
                  <div class="font-w600 text-white-op push-15-t">Photos</div>
              </div>
          </a>
          </div>

          <div class="col-md-4">
          <a class="block block-link-hover2 text-center" href="{{ url('/admin/modules/Modvel/files/videos')}}">
              <div class="block-content block-content-full bg-primary">
                  <i class=" fa-4x fa fa-video-camera fa-align-justify text-white"></i>
                  <div class="font-w600 text-white-op push-15-t">Videos</div>
              </div>
          </a>
          </div>

          <div class="col-md-4">
          <a class="block block-link-hover2 text-center" href="{{ url('/admin/modules/Modvel/files/documents')}}">
              <div class="block-content block-content-full bg-primary">
                  <i class=" fa-4x fa fa-book text-white"></i>
                  <div class="font-w600 text-white-op push-15-t">Documents</div>
              </div>
          </a>
          </div>
      </div>
      <div class="row">
         <div class="col-md-4 col-md-offset-1">
          <a class="block block-link-hover2 text-center" href="{{ url('/admin/modules/Modvel/files/uploadedfiles')}}">
              <div class="block-content block-content-full bg-primary">
                  <i class=" fa-4x fa fa-file text-white"></i>
                  <div class="font-w600 text-white-op push-15-t">Uploaded Files</div>
              </div>
          </a>
          </div>
          <div class="col-md-4 col-md-offset-1">
          <a class="block block-link-hover2 text-center" href="{{ url('/admin/modules/Modvel/files/audios')}}">
              <div class="block-content block-content-full bg-primary">
                  <i class=" fa-4x fa fa-volume-up text-white"></i>
                  <div class="font-w600 text-white-op push-15-t">Audios</div>
              </div>
          </a>
          </div>
      </div>
    </div>
</div>

@endsection
