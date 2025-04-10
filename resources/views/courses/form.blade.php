@extends('layouts.app')

@section('content')

<h2>Nuevo Curso</h2>

	@if($course->id==null)
		<form method="post" action="{{ route('courses.store') }}">
	@else
		<form method="post" action="{{ route('courses.update', $course->id) }}">
			@method('put')
	@endif
	
		@csrf
	  <div class="form-group">
	    <label for="exampleInputEmail1">Titulo</label>
	    <input type="text" class="form-control" name="title" value="{{ $course->title }}">
	   </div>

	   <div class="form-group">
	    <label for="exampleFormControlTextarea1">Descripcion</label>
	    <textarea class="form-control" name="description" rows="3">{{ $course->description }}</textarea>
	  </div>
		  <button type="submit" class="btn btn-primary">Guardar</button>
	</form>
@endsection