@extends('layouts.app')

@section('content')
<div class="container pb-pt-60">
    <div class="row justify-content-md-center">
        <div class="col"> 
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
            <h3>Add New Customer</h3>
            <form action="{{route('customerStore')}}" method="POST">
            {{csrf_field()}}
                       
                <table>
                    <tr>
                        <td><p class="lable {{$errors->has('chasis')?'has-error':''}}">VIN</p> </td>
                        <td >
                           <input value="{{old('chasis')}}" type="text" id="vin" name="chasis">  
                        </td>
                        <td>
                            <button class="mybtn mybtn-add" id="js-check-vin" type="button">Check</button>
                        </td>
                        <td><div id="vin-search-result"> </div></td>
                    </tr>

                    <tr>
                        <td><p class="lable {{$errors->has('name')?'has-error':''}}">Name:</p>  </td>
                        <td colspan="3">
                           <input value="{{old('name')}}" type="text" name="name"> 
                        </td>
                    </tr>

                    <tr>
                        <td><p class="lable {{$errors->has('tel')?'has-error':''}}">Tel:</p>  </td>
                        <td colspan="3">
                           <input value="{{old('tel')}}" type="text" name="tel">  
                        </td>
                    </tr>

                    <tr>
                        <td><p class="lable {{$errors->has('plate')?'has-error':''}}">Plate Number:</p>  </td>
                        <td colspan="3">

                           <input class="input-plate" value="{{old('plate')}}" type="text" name="plate">
                        
                           <input class="input-zone {{$errors->has('plate')?'has-error-border':''}}" placeholder="Zone" 
                            value="{{old('zone')}}" type="text" name="zone">
                        </td>
                    </tr>

                    <tr>
                        <td><p class="lable {{$errors->has('year')?'has-error':''}}">Year:</p> </td>
                        <td colspan="3">
                           <input value="{{old('year')}}" type="text" name="year">   
                        </td>
                    </tr>

                    <tr>
                        <td><p class="lable {{$errors->has('model')?'has-error':''}}">Model:</p> </td>
                        <td colspan="3">
                           <input value="{{old('model')}}" type="text" name="model">    
                        </td>
                    </tr>

                    <tr>
                        <td><p class="lable {{$errors->has('make')?'has-error':''}}">Make:</p>  </td>
                        <td colspan="3">
                           <input value="{{old('make')}}" type="text" name="make">   
                        </td>
                    </tr>

                </table>    
                <button type="submit" class="mybtn mybtn-add">Add Customer And Open Job Card</button>
            </form>
        </div>
    </div>
</div>
@endsection
@section('check-vin')
<script>

    $(document).ready(function(){

        $('#js-check-vin').on('click',function(){
            var key = $('#vin').val()

            $.ajax({
                url:"{{route('searchVIN')}}",
                method:'GET',
                data:{data:key},
                success:function(data){
                    console.log(data)
                    $('#vin-search-result').html(data.result)
                }
            });
        });

    });
</script>
@endsection



