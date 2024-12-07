@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col"> 
        <div class="card">
            <div class="card-head">

            Add More Complaint
            </div>
            <div class="card-body">
            <form action="{{route('complaintsMoreStore')}}" method="POST">
                {{csrf_field()}}    
                <input class="form-control" name="descr" value="" required="required" /> 
                <input type="hidden" name="repairorder_id" value="{{$ro_id}}">
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <button type="submit" class="mybtn mybtn-new" >Add</button>
                <a class="mybtn mybtn-new" href="{{route('home')}}">Back</a>
            </form>
            </div>
        </div>
        </div>
    </div>

</div>
@endsection