@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col"> 
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
            <h3>Open New Repair Order</h3>
        </div>
    </div>

        <form action="{{route('ROStore')}}" method="POST">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-6"> 
                <p class="">Customer Name:</p> <input value="{{$car->customer->name}}" class="myinput" name="name" >        
            </div>
            <div class="col-md-6">     
                <p class="">Customer Phone:</p> <input value="{{$car->customer->tel}}" class="myinput" name="tel" > 
            </div>
        </div>

        <div class="row">
            <div class="col-md-3"> 
                <p class="lable">Plate:</p> <input value="{{$car->plate}}" type="text" name="plate">
            </div>
            <div class="col-md-3">  
                <p class="lable">Zone:</p> <input value="{{$car->zone}}" type="text" name="zone"> 
            </div>  
            <div class="col-md-3">    
                <p class="lable">Year:</p> <input value="{{$car->year}}" type="text" name="year">        
            </div>
            <div class="col-md-3"> 
                <p class="lable">Model:</p> <input value="{{$car->model}}" type="text" name="model">      
            </div>
        </div>

        <div class="row">
            <div class="col-md-3"> 
                <p class="lable">Make:</p> <input value="{{$car->make}}" type="text" name="make">       
            </div>
            <div class="col-md-3"> 
                <p class="lable">VIN:</p> <input value="{{$car->chasis}}" type="text" name="chasis">        
            </div>
            <style>
                .km-reading{
                    width: auto;
                }
                .la{
                    height: 15px;
                }
                .color-danger{
                    color:red;
                }
                .postion{
                    display: inline-block;
                }
            </style>
            <div class="col-md-6"> 
                <table>
                    <tr>
                        <td><p class="lable {{$errors->has('km')?'has-error':''}}">ODO:</p></td>
                        <td>
                            <input type="number" name="km" class="km-reading">
                            <div class="{{$errors->has('kmType')?'color-danger':''}} postion">
                                <input type="radio" name="kmType" class="km-reading la" value="KM" >KM
                                <input type="radio" name="kmType" class="km-reading la" value="Mile">Mile                                 
                            </div>

                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <input  type="hidden" name="user_id" value="{{ Auth::user()->id }}" > 
            <input  type="hidden" name="car_id" value="{{ $car->id }}" > 
            <input  type="hidden" name="customer_id" value="{{ $car->customer->id }}" > 
            <button type="submit" class="mybtn mybtn-add">Open New Repair Order With This Info</button>
        </div>
        </form>
        
    </div>
</div>
@endsection
