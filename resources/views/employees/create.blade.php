@extends('layout')

@section('title', 'Add Employee')

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

	<form action="{{ route('employees-post') }}" method="POST">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control"/>
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control"/>
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" id="password"  class="form-control"/>
		</div>
		<div class="form-group">
			<label for="address">Address</label>
			<textarea name="address" id="" cols="30" rows="10" class="form-control">{{ old('address') }}</textarea>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success">
				<span>Create Employee</span>
			</button>
		</div>
	</form>
@endsection