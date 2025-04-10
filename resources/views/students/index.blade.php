@extends('layouts.app')

@section('content')

<h2>Estudiantes</h2>
<br>
<a type="button" href="{{ route('students.create') }}" class="btn btn-primary">Nuevo Alumno</a>


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Email</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($students as $student)
  		<tr>
      <th scope="row">{{ $student->id }}</th>
      <td>{{ $student->name }}</td>
      <td>{{ $student->email }}</td>
      <td>
      	<a type="button" href="{{ route('students.edit',$student->id) }}" class="btn btn-primary">Editar</a>
      	<a type="button" href="{{ route('students.show',$student->id) }}" class="btn btn-primary">Inscripcion Curso</a>
      	<form method="post" action="{{ route('students.destroy', $student->id) }}">
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