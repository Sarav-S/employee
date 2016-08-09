@extends('layout')

@section('title', 'Employee Listing')

@section('content')
	<h2>
		Employee Listing
		<a href="{{ route('employees-create') }}" class="btn btn-success btn-xs">
			Add Employee
		</a>
	</h2>
	@if (count($employees)) 
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Address</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($employees as $employee)
					<tr>
						<td>{{ $employee->id }}</td>
						<td>{{ $employee->name }}</td>
						<td>{{ $employee->email }}</td>
						<td>{{ $employee->address }}</td>
						<td>
							<a class="btn btn-warning btn-xs" href="{{ route('employees-edit', $employee->id) }}">Edit</a>
							<form action="{{ route('employees-delete', $employee->id) }}" method="POST" style="display:inline">
								{{ method_field('DELETE') }}
								{{ csrf_field() }}
								<button class="btn btn-danger btn-xs">
									<span>Delete</span>
								</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		<div class="text-center">
			{{ $employees->links() }}
		</div>
	@else
		<p class="alert alert-info">
			Nothing to list
		</p>
	@endif
@endsection