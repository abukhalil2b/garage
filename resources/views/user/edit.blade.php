@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit User</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Start body -->
                    <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-md-12 ">   
                            <a href="{{route('home')}}" class="mybtn mybtn-new">Back</a>  
                            <table class="mytable">
                            <tr>
                                <thead>
                                    <td>Names</td>
                                    <td>Username</td>
                                    <td>Password</td>
                                    <td>control</td>
                                </thead>
                            </tr>
                            <tr>
                                <form action="{{route('userUpdate')}}" method="post">
                                    {{csrf_field()}}
                                    <td><input type="text" name="name" value="{{$user->name}}" ></td>
                                    <td><input type="text" name="email" value="{{$user->email}}" disabled="true" ></td>
                                    <td><input type="text" name="plain_password" value="{{$user->plain_password}}" ></td>
                                    <td>
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <button class="mybtn mybtn-new" type="submit">SAVE</button>
                                    </td>                                    
                                </form>
                            </tr>
                            </table>
                        </div>
                    </div>
                    </div>
                <!-- End body -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
              