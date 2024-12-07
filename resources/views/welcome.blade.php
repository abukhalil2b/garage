@extends('layouts.app')

@section('content')
<style>
	.justify-content-md-center{
		margin-top: 15%;
        text-align: center;
	}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12 justify-content-md-center">
        	<a href="{{route('login')}}">
        		<img src="{{url('./img/logo.png')}}" width="550" >
        	</a>
        </div>
    </div>
</div>
@endsection
