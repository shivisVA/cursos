@extends('layouts.app')

@section('content')

<h3>{{ $student->name }}</h3>

<form method="post" action="{{ route('coursestudent.store', $student->id) }}">
	@csrf
	 <div class="form-group">
	    <label for="exampleFormControlSelect1">Selecciona Curso</label>
	    <select class="form-control" name="course_id">
	    	@foreach($courses as $course)
	    		<option value="{{ $course->id }}">{{ $course->title }}</option>
	    	@endforeach
	      	      
	    </select>
	  </div>
	  <label>Fecha de Inscripción</label>
	  <input type="date" name="enrrollment_date">
	  <br>
<button type="submit" class="btn btn-primary">Guardar</button>

</form>
@endsection