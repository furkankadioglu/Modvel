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
<script>
	 CKEDITOR.replace( 'content');
</script>
@endsection

@section('modals')

@endsection


@section('content')

<div class="block block-bordered">
    <div class="block-header bg-gray-lighter">
   	 	<ul class="block-options">
           @include('Modvel::admin.navigation')
        </ul>
        <h3 class="block-title"><i class="fa fa-pencil-square-o"></i> {{ $headName }}</h3>
    </div>
    <div class="block-content">
        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
        <table class="table table-bordered table-striped js-dataTable-full">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>File Name</th>
                    <th>Display Name</th>
                    <th>Category Name</th>
                    <th>Relationship ID</th>
                    <th class="text-center" style="width: 10%;">Updated At</th>
                    <th class="text-center" style="width: 10%;">Created At</th>
                </tr>
            </thead>
            <tbody>
            @foreach($datas as $data)
            <tr>
                <td class="text-center">{{ $data->id }}</td>
                <td>{{ $data->fileName }}</td>
                <td>{{ $data->displayName }}</td>
                <td>{{ $data->categoryName }}</td>
                <td>{{ $data->relId }}</td>
                <td>{{ $data->updated_at }}</td>
                <td>{{ $data->created_at }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection



