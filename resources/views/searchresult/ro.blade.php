@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col"> 
            <div class="card">
                <div class="card-head">
                <p>List Job Card</p>
                </div>
                <div class="card-body">
                    @foreach($ros as $ro)
                        <span style="display: block; border-bottom: 1px solid #d1d1d1">
                            JC:{{$ro->id}} - 
                            {{$ro->car->plate}}{{$ro->car->zone}} - 
                            {{$ro->car->make}} {{$ro->car->model}} - 
                            {{$ro->status}} - 
                            {{$ro->user->name}}
                            {{$ro->created_at}}  
                            <span class="mybtn-history">
                                <a href="{{route('complaintsShow',['repairorder_id'=>$ro->id])}}">Complaints</a>
                             </span>
                             <span class="mybtn-history">
                                <a href="{{route('ROEdit',['ro_id'=>$ro->id])}}">Edit</a>
                            </span>
                        </span> 
                    @endforeach
  
                </div>
            </div>{{$ros->links()}}
        </div>
    </div>
</div>
@endsection
