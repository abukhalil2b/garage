@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col"> 
            <div class="card">

                <div class="card-head">
                    <p>List Customers Related Customer Name</p>
                </div>

                <div class="card-body">
                    @foreach($names as $cust)
                        <span style="display: block; border-bottom: 1px solid #d1d1d1">
                            {{$cust->name}} - {{$cust->tel}}
                            <a href="{{route('carShow', ['cust_id'=>$cust->id] )}}" class="mybtn-history">Show</a>  
                        </span> 
                    @endforeach
                </div>

            </div>
            {{$names->links()}}
        </div>
    </div>
</div>
@endsection
