@extends('layouts.app')

@section('content')
<div class="container">

	<form action ="{{ url('/bodega')}}" method="post">
		@csrf
		@include('bodega.form',['modo'=>'Crear']);

	</form>
</div>	
@endsection