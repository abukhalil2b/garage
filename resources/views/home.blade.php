@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="h3">Search</p>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert {{ session('alert') }}">
                        {{ session('status') }}
                    </div>
                    @endif

                    <!-- Start body -->
                    <div class="container">
                        <div class="row justify-content-md-center">
                            <div class="col-md-8">
                                <form action="{{route('searchPlate')}}" method="POST">
                                    {{csrf_field()}}
                                    <p class="lable">PLATE:</p>
                                    <input class="input-plate" type="number" name="plate">
                                    <input class="input-zone" name="zone">
                                    <button type="submit" class="mybtn mybtn-search">search</button>
                                </form>

                                <form action="{{route('searchChasis')}}" method="POST">
                                    {{csrf_field()}}
                                    <p class="lable">CHASIS:</p> <input name="chasis"> <button type="submit" class="mybtn mybtn-search">search</button>
                                </form>

                                <form action="{{route('searchTel')}}" method="POST">
                                    {{csrf_field()}}
                                    <p class="lable">TEL:</p> <input name="tel"> <button type="submit" class="mybtn mybtn-search">search</button>
                                </form>

                                <form action="{{route('searchName')}}" method="POST">
                                    {{csrf_field()}}
                                    <p class="lable">Name:</p> <input name="name"> <button type="submit" class="mybtn mybtn-search">search</button>
                                </form>


                                <form action="{{route('searchRO')}}" method="POST">
                                    {{csrf_field()}}
                                    <p class="lable">J/C:</p> <input name="ro"> <button type="submit" class="mybtn mybtn-search">search</button>
                                </form>
                            </div>
                            <div class="col-md-2 ">
                                <a href="{{route('customerCreate')}}" class="mybtn mybtn-new">New Customer</a>
                                <a href="{{route('status.change')}}" class="mybtn mybtn-new">Change Status</a>
                                @if(auth()->user()->id==1)
                                <a href="{{route('userCreate')}}" class="mybtn mybtn-new">User</a>
                                <a target="_blank" href="{{route('status.show')}}" class="mybtn mybtn-new">status</a>
                                @endif
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