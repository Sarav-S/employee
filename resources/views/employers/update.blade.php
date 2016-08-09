@extends('layout')

@section('title', 'Create Employer')

@section('content')
	{!! Form::model($employer, ['url' => route('employers.update', $employer->id), 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
		@include('employers._form')
	{!! Form::close() !!}
@endsection