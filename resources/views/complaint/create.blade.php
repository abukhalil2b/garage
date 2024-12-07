@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row c">
        <h3>Open New Repair Order</h3>
        <div class="col"> 
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        </div>
    </div>

        <form action="{{route('complaintStore')}}" method="POST">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-6"> 
                <p class="">Customer Name: </p> {{$ro->name}}       
            </div>
            <div class="col-md-6">     
                <p class="">Customer Phone: </p> {{$ro->tel}} 
            </div>
        </div>

        <div class="row">
            <div class="col-md-3"> 
                <p class="lable">Plate: </p> {{$ro->plate}} 
            </div>
            <div class="col-md-3">  
                <p class="lable">Zone: </p> {{$ro->zone}} 
            </div>  
            <div class="col-md-3">    
                <p class="lable">Year:</p> {{$ro->year}}     
            </div>
            <div class="col-md-3"> 
                <p class="lable">Model:</p> {{$ro->model}}     
            </div>
        </div>

        <div class="row">
            <div class="col-md-3"> 
                <p class="lable">Make: </p> {{$ro->make}}  
            </div>
            <div class="col-md-3"> 
                <p class="lable">VIN: </p> {{$ro->chasis}}    
            </div>
            <div class="col-md-3"> 
                <p class="lable">ODO: </p> {{$ro->km}} 
            </div>
            <div class="col-md-3">     
                
            </div>
        </div>

        <div class="row">
            <h3>Repair Order Complaints</h3>
            <div class="col-md-12">  
            <input type="text" name="descr[]" class="comp">
            <input type="text" name="descr[]" class="comp">
            <input type="text" name="descr[]" class="comp">
            <input type="text" name="descr[]" class="comp">
            <input type="text" name="descr[]" class="comp">
            <input type="text" name="descr[]" class="comp">
            <input type="text" name="descr[]" class="comp">
            <input type="text" name="descr[]" class="comp">
            <input type="text" name="descr[]" class="comp">
            <input type="text" name="descr[]" class="comp">
            <input type="text" name="descr[]" class="comp">
            <input type="text" name="descr[]" class="comp">
                <!-- <textarea name="descr"></textarea> -->
            </div>
            <div class="col-md-12 pb-50">
            <input type="hidden" name="repairorder_id" value="{{$ro->id}}">
            <input type="hidden" name="user_id" value="{{$ro->user_id}}">
            <button class="mybtn mybtn-save" type="submit" >Save</button>
            </div>

        </div>


        </form>

    </div>
</div>
@endsection
