@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 justify-content-md-center">
        		<table class="table table-bordered">
                    <tr>
                        <td>JC NUMBER</td>
                        <td>status</td>
                    </tr>
                    @foreach($ros as $ro)
                    <tr>
                        <td>{{$ro->id}}</td>
                        <td>
                            <a href="{{route('status.edit',['id'=>$ro->id])}}" class="btn mybtn-save">
                                 {{$ro->status}}
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
        </div>
    </div>
</div>
@endsection
