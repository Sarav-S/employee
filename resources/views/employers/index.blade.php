@extends('layout')

@section('title', 'Employer Listing')

@section('content')
	<h2>
		Employer Listing
		<a href="{{ route('employers.create') }}" class="btn btn-success btn-xs">
			Add Employer
		</a>
	</h2>
	@if (count($employers)) 
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($employers as $employer)
					<tr>
						<td>{{ $employer->id }}</td>
						<td>{{ $employer->name }}</td>
						<td>{{ $employer->email }}</td>
						<td>
							<a class="btn btn-warning btn-xs" href="{{ route('employers.edit', $employer->id) }}">Edit</a>
							<form action="{{ route('employers.destroy', $employer->id) }}" method="POST" style="display:inline">
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
			{{ $employers->links() }}
		</div>
	@else
		<p class="alert alert-info">
			Nothing to list
		</p>
	@endif
@endsection