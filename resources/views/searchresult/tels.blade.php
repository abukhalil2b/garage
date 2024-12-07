@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col"> 
            <div class="card">
                <div class="card-head">
                <p>List Customers Related Phone Number</p>
                </div>
                <div class="card-body">
                    @foreach($tels as $cust)
                        <span style="display: block; border-bottom: 1px solid #d1d1d1">
                            {{$cust->name}}- {{$cust->tel}}
                            <a class="mybtn-history" href="{{route('carShow',['cust_id'=>$cust->id])}}" >Show</a>  
                        </span> 
                    @endforeach
                </div>
            </div> 
            {{$tels->links()}}
        </div>
    </div>
</div>
@endsection
