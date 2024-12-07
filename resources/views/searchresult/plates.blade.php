@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col"> 
        <div class="card">
            <div class="card-head">
            <p>List Cars Related Plate Number</p>
            </div>
            <div class="card-body">
                @foreach($plates as $car)
                    <span style="display: block; border-bottom: 1px solid #d1d1d1">
                        {{$car->plate}} {{$car->zone}} - 
                        {{$car->make}} - 
                        {{$car->model}} - 
                        {{$car->year}} - 
                        {{$car->chasis}} - 
                        {{$car->customer->name}} - 
                        {{$car->customer->tel}}
                        <span class="mybtn-history">
                            
                            <a href="{{route('ROCreate',['car_id'=>$car->id])}}" >New J/C</a>
                        </span>
                        <span class="mybtn-history">
                            <a href="{{route('ROShow',['car_id'=>$car->id,'cust_id'=>$car->customer->id])}}" >History</a>
                        </span>
                    </span>
                @endforeach
            </div>
            {{$plates->links()}}
        </div>
        </div>
    </div>
</div>
@endsection
