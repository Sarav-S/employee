@extends('layout')

@section('title', 'Edit Employee')

@section('content')
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<form action="{{ route('employees-update', $employee->id) }}" method="POST">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" value="{{ $employee->name or old('name') }}" class="form-control"/>
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" name="email" id="email" value="{{ $employee->email or  old('email') }}" class="form-control"/>
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" id="password"  class="form-control"/>
		</div>
		<div class="form-group">
			<label for="address">Address</label>
			<textarea name="address" id="" cols="30" rows="10" class="form-control">{{ $employee->address or old('address') }}</textarea>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success">
				<span>Update Employee</span>
			</button>
		</div>
	</form>
@endsection