@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col"> 
            <h3>Cars</h3>
            @foreach($cars as $car)

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
                    <br>
            @endforeach
        </div>
    </div>
</div>
@endsection
