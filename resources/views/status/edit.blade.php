@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 justify-content-md-center">
    		<table class="table table-bordered">
                <tr >
                    <td >status</td>
                </tr>
                <tr>
                    <td >
                        <form action="{{route('status.update')}}" method="post" >
                            {{csrf_field()}}
                            <select name="status" class="form-control">
                                @foreach($status as $stat)
                                    <option value="{{$stat->id}}">{{$stat->en_option}}</option>
                                @endforeach
                            </select>  
                            <input type="hidden" name="ro_id" value="{{$ro->id}}">
                            <button class="btn mybtn-save" type="submit">Save</button>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
