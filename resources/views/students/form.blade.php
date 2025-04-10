@extends('layouts.app')

@section('content')

<h2>Nuevo Alumno</h2>

	@if($student->id==null)
		<form method="post" action="{{ route('students.store') }}">
	@else
		<form method="post" action="{{ route('students.update', $student->id) }}">
			@method('put')
	@endif
	
		@csrf
	  <div class="form-group">
	    <label for="exampleInputEmail1">Nombre</label>
	    <input type="text" class="form-control" name="name" value="{{ $student->name }}">
	   </div>

	   <div class="form-group">
	    <label for="exampleFormControlTextarea1">Email</label>
	    <input type="email" class="form-control" name="email" value="{{ $student->email }}">
	  </div>
	  
		  <button type="submit" class="btn btn-primary">Guardar</button>
	</form>
@endsection