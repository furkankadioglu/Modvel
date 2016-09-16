@extends('masters.main')

@section('content')

	@foreach($datas as $data)
		{{ $data }}
	@endforeach

@endsection