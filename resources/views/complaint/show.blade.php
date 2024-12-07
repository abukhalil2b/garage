@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col"> 
        <div class="card">
            <div class="card-head">
            <h5>Job Card</h5>
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            </div>
            <div class="card-body">
                RO:{{$ro->id}} - 
                Tel:{{$ro->customer->tel}} - 
                REG:{{$ro->car->plate}}{{$ro->car->zone}} - 
                Car:{{$ro->car->make}} {{$ro->car->model}} - 
                KM:{{$ro->km}} - 
                status:{{$ro->status}} - 
                Open By:{{$ro->user->name}}
                Date:{{$ro->created_at}}  
            </div>
        </div>
        </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col"> 
        <div class="card">
            <div class="card-head">
            <h5> Complaints </h5>
           
            </div>
            <div class="card-body">
                <table class="table">
                    @foreach($ro->complaints as $comp)
                    <tr>                
                        <td>
                           {!!$comp->descr!!} 
                        </td>
                        <td>
                           <a href="{{route('complaintsEdit',['complaint_id'=>$comp->id])}}"><p>Edit</p></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{route('complaintsMore',['ro_id'=>$ro->id])}}">
                <span class="mybtn-history">More</span>
                <a href="{{route('ROPrint',['roID'=>$ro->id])}}" class="mybtn-history">Print</a>
            </a>
        </div>
    </div>
</div>
@endsection