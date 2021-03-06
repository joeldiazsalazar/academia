@extends('layouts.admin')

@section('contenido')


<h1>Usuarios</h1>

<table class="table">
	

<thead>
	<tr>
	<th>ID</th>
	<th>Nombre</th>
	<th>Email</th>
	<th>Role</th>
	<th>Assigned</th>
	<th>Acciones</th>
	</tr>
</thead>
<tbody>
	
	@foreach ($users as $user)
	<tr>
	<td>{{ $user->id }}</td>

	<td>{{ $user->name }}</td>

	<td>{{ $user->email }}</td>

	<td>{{ $user->role->display_name}}</td>
	
	<td>

		@foreach($user->student as $students)
		<a href="/students/show/{{ $students->id }}">

			{{ $students->email }}

		</a>
		@endforeach

		


		
	
	</td>

	<td>
		<a class="btn btn-info btn-xs" href="{{ route('users.edit', $user->id) }}">Editar</a>
				<form style="display: inline;" method="POST" action=" {{ route('users.destroy', $user->id) }}">

					{!! csrf_field() !!}
					{!! method_field('DELETE') !!}
					
					<button class="btn btn-danger btn-xs" type="submit">Eliminar</button>

				</form>
	</td>

</tr>
	@endforeach
</tbody>
</table>
@stop