@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col"> 
            <h3>Job Card</h3>
            @foreach($ros as $ro)
            <span style="display: block; border-bottom: 1px solid #d1d1d1">
                <p>JC:</p>{{$ro->id}} 
                <p>Tel:</p>{{$ro->customer->tel}} 
                <p>REG:</p>{{$ro->car->plate}}{{$ro->car->zone}} 
                <p>Car:</p>{{$ro->car->make}} {{$ro->car->model}} 
                <p>KM:</p>{{$ro->km}} 
                <p>status:</p>{{$ro->status}} 
                <p>OpenBy:</p>{{$ro->user->name}}
                <p>Date:</p>{{$ro->created_at}}
                <a href="{{route('complaintsShow',['ro_id'=>$ro->id])}}"><span class="mybtn-history">Details</span></a>
            </span>
            @endforeach
        </div>
    </div>
</div>
@endsection
