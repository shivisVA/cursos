@extends('layouts.app')

@section('content')

<h2>Cursos</h2>
<br>
<a type="button" href="{{ route('courses.create') }}" class="btn btn-primary">Nuevo Curso</a>


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($courses as $course)
  		<tr>
      <th scope="row">{{ $course->id }}</th>
      <td>{{ $course->title }}</td>
      <td>{{ $course->description }}</td>
      <td>
      	<a type="button" href="{{ route('courses.edit',$course->id) }}" class="btn btn-primary">Editar</a>
      	<a type="button" href="" class="btn btn-primary">Detalle</a>
      	<form method="post" action="{{ route('courses.destroy', $course->id) }}">
      		@method('delete')
      		@csrf
      		<button type="submit" class="btn btn-danger">Eliminar</button>

      	</form>
      </td>
    </tr>
  	@endforeach
    
    
  </tbody>
</table>
@endsection