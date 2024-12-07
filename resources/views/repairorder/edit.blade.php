@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col"> 
        <div class="card">
            <div class="card-head">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            Job Card 
            </div>
            <div class="card-body">
            <form action="{{route('ROUpdate')}}" method="POST">
                {{csrf_field()}}    
                <input class="form-control" name="km" value="{{$ro->km}}" /> 
                <input type="hidden" name="ro_id" value="{{$ro->id}}">
                <button type="submit" class="mybtn mybtn-new" >Update</button>
                <a class="mybtn mybtn-new" href="{{route('home')}}">Back</a>
            </form>
            </div>
        </div>
        </div>
    </div>

</div>
@endsection