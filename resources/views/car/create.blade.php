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
            <h3>Add New Car</h3>
            <form action="{{route('carStore')}}" method="POST">
            {{csrf_field()}}
                <p class="lable">Plate Number:</p> <input type="text" name="plate">
                <br> 
                <p class="lable">Zone:</p> <input type="text" name="zone"> 
                <br>     
                <p class="lable">Year:</p> <input type="text" name="year">        
                <br>
                <p class="lable">Model:</p> <input type="text" name="model">      
                <br>
                <p class="lable">Make:</p> <input type="text" name="make">       
                <br>
                <p class="lable">Chasis:</p> <input type="text" name="chasis">        
                <br>
                <p class="lable">Customer:</p>
                <select name="customer_id">
                    @foreach($customers as $customer)
                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                    @endforeach
                </select>
                <button type="submit" class="mybtn mybtn-add">Add  Car </button>
            </form>
        </div>
    </div>
</div>
@endsection
