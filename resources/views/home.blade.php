@extends('layouts.app')

@section('content')

@foreach($courses as $course)
	<div class="card mb-3">
		<h3>{{ $course->title }}</h3>
		<p>Estudiantes Inscritos:{{ $course->students->count() }}</p>

		<ul>
			@foreach($course->students as $student)
			<li>
				{{ $student->name}}-
				Inscrito el: {{ $student->pivot->enrrollment_date }}
			</li>
			@endforeach
				
		</ul>
	</div>
@endforeach

@endsection