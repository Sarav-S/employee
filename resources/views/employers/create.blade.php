@extends('layout')

@section('title', 'Create Employer')

@section('content')
	{!! Form::open(['url' => route('employers.store'), 'method' => 'POST', 'class' => 'form-horizontal']) !!}
		@include('employers._form')
	{!! Form::close() !!}
@endsection