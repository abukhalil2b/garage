
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PRINT</title>
<style>
    a{
        font-size:18px;
        font-weight:bold;
        text-decoration:none;
    }

    a:hover{
        text-decoration:none;
    }

    @media print {
        a{
            display:none;
        }
    }
    .logo{
        width:200px;
    }
    .title {
        font-size: 14px !important;
        font-weight: bold !important;
    }
    .title-h{
        font-size: 16px !important;
        font-weight: bold !important;
    }

    .title-logo{
        font-size: 16px !important;
        font-weight: bold !important;     
    }

    table{    
        width:100%;
        height:74px;
    }
    .tableborder{    
        border-top:1px solid #000; 
    }
    .a4{
        width:210mm;
        height:297mm;
        font-size:14px;
    }

    .roinfo{
        border:1px solid #858383;
    }
    .lineheigh{
        line-height:2px;
    }
    .center{
        text-align:center;
    }

    .row{
        border:1px solid #000;
        display:flex;
    }
    .col{
        width:50%;
        height:550px;
    }
    .col-h{
        width: 50%;
        height: 18px;
        text-align: center;
    }
    .v-line{
        border-left:1px solid #000;
    }
    .comp{

    }
    .description{
        font-weight:bold;
        padding:4px;
    }
    .col-3{
        width:25%
    }
    .col-3{
        width:25%
    }
    .col-6{
        width:50%;
    }

    .col-2{
        width:10%;
    }

    .col-8{
        width:80%;
    }

    hr{
        margin-bottom:20px;
    }
    .hr-frist{
        margin-top:20px; 
    }

    .row-footer{
        border:1px solid #000;
        display:flex;
        height:63px;
        padding-top:8px;
    }
    html{
        font-size:20px;
    }
</style> 

</head>
<body>
<a href="#"
    onclick="event.preventDefault();
                print();">
    <b>Print</b>
</a>
<a href="{{route('home')}}" > | home</a>
<div class="a4">
    <div class="roinfo">
        <table>
            <tr>
                <td class="center logo"><img class="logo-img" src="{{ asset('img/logo.png') }}" width=180 alt=""></td>
                <td class="title-h"></td>
                <td class="center lineheigh">
                <p class="title-logo">العالم التقني لخدمة السيارات</p>
                <p class="title-logo">Technical World For Car Service</p>
                </td>
                <td class="title-h">
                    CARD
                    <br>
                    JOB
                </td>
                <td>
                   JC NO: {{$ro->id}}
                   <br>
                   DATE: {{$ro->created_at->format('d/m/Y')}}
                   <!-- {{substr($ro->created_at,0,10)}} -->
                </td>
                
            </tr>
        </table>
        <table class="tableborder">
            <tr>
                <td colspan=2><span class="title">VEH. REG. NO.:</span> {{$ro->plate}}{{$ro->zone}} </td>
                <td><span class="title">CUST:</span> {{$ro->name}}</td>
            </tr>
            <tr>
                <td colspan=2><span class="title">YRS/MK/MDL:</span> {{$ro->year}} / {{$ro->make}} / {{$ro->model}} </td>
                
                <td><span class="title">TEL:</span> {{$ro->tel}}</td>
            </tr>
            <tr>
            <td><span class="title">VIN:</span> {{$ro->chasis}}</td>
            <td><span class="title">ODO:</span> {{$ro->km}}</td>
            <td><span class="title">REMARKS:</span> {{$ro->remark}}</td>
            </tr>
        </table>
        <div class="row">
            <div class="col-h">
            CUSTOMER REQ./ORDER./ISSUE.
            </div>
            <div class="col-h v-line">
            CHECK POINTS
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="comp">
                        <style>
                            .mtable{
                                margin-left: -3px;
                                margin-top: -3px;
                                
                            }
                            .border{
                                border-bottom: 1px solid #d1d1d1;
                            }
                            .num{
                                padding-left: 3px;
                            }
                        </style>
                    <table class="mtable">
                        @foreach($ro->complaints as $key => $com)
                        <tr>
                            <td class="border">
                                <span class="num">{{$key+1}}</span>
                            </td>
                            <td class="border">{{$com->descr}} </td>
                        </tr>
                        @endforeach 
                    </table>
                </div>
            </div>
            <div class="col v-line">
                <style>
                    .rect{
                        width: 15px;
                        height: 15px;
                        border: 1px solid;
                    }
                    .chpoint{
                        font-size: 10px;
                    }
                </style>
                <table class="chpoint">
                    <tr>
                        <td>FR LINK ROD  L/R </td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>FR AXL BT OUT L/R </td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>VLV CVR LEAK </td>
                        <td>
                            <div class="rect"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>FR D BUSH   L/R </td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>FR AXL BT IN  L/R </td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>IGN SEAL LEAK</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>TID ROD END  L/R </td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>FR AXL SEAL L/R </td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>AIR FILTER DIRTY</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                    </tr>

                    <tr>
                        <td>BACK END  L/R </td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>FR SHOCK L/R </td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>AC FILTER DIRTY</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                    </tr>

                    <tr>
                        <td>STG BOOT  L/R </td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>FR SHOCK INSLTR L/R </td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>AIR DUCT DMG</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                    </tr>

                    <tr>
                        <td>STG ROD LEAK</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>ENG MOUNT </td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>S/PLUG DMG</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                    </tr>

                    <tr>
                        <td>VEN PUMP DMG</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>GEAR MOUNT </td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>MAIN SHIFT U/J DMG</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                    </tr>

                    <tr>
                        <td>ALTNTR BRG</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>ENG PAN LEAK </td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>TRANSFR CASE LEAK</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                    </tr>

                    <tr>
                        <td>IDLER BRG</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>CRANK SEAL F/R </td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>INTRCOOLR LEAK</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                    </tr>

                    <tr>
                        <td>TENSIONER BRG</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>ATM PAN LEAK </td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>R/R WHL BRG L/R</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                    </tr>

                    <tr>
                        <td>V-BELT</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>CONV SEAL LEAK </td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>RR SHOCK L/R</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                    </tr>

                    <tr>
                        <td>FR BRK PAD</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>EXHAUST SEAL LEAK </td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>RR SHOCK L/R</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                    </tr>

                    <tr>
                        <td>FR BRK DISC L/R</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>EXHAUST MOUNT </td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>RR DIFR LEAK</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                    </tr>

                    <tr>
                        <td>RR BRK PAD SHOE</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>FR DIFR SEAL LEAK </td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>RR DIFR MOUNT</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                    </tr>

                    <tr>
                        <td>RR BRK DISC L/R</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>FR DIFR MOUNT </td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>RR LWR ARM BSH L/R</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                    </tr>

                    <tr>
                        <td>PARKING LINER</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>RF SHAFT UJ DMG </td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>RR UPR ARM BSH L/R</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                    </tr>

                    <tr>
                        <td>FR LWR ARM BUSH L/R</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>FR WHL BRG L/R </td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>RR LTRL BAR BSH</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                    </tr>

                     <tr>
                        <td>FR UPR ARM BUSH L/R</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>WTR PUMP DMG </td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>KNUCKLE BUSH L/R</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>LWR BLINT L/R</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>COOLANT LEAK </td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>RR AXL BUSH</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                    </tr>   

                    <tr>
                        <td>UPR BLINT L/R</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>RDTR LEAK </td>
                        <td>
                            <div class="rect"></div>
                        </td>
                        <td>RR AXLE BOOT</td>
                        <td>
                            <div class="rect"></div>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-h">
            TECHNICAL REPORT
            </div>
            <div class="col-h v-line">
            PARTS REQUIRED
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <hr class="hr-frist">
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
            </div>
            <div class="col-8 v-line">
                <hr class="hr-frist">
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
            </div>
            <div class="col-2 v-line">
                <hr class="hr-frist">
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
            </div>
            <div class="col-8 v-line">
                <hr class="hr-frist">
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
            </div>            
        </div>
        <style>
            .pr{
                padding-right: 50%;
                padding-left: 5%;
                display: block;
            }

            .pl{
                display: block;
                padding-left: 50%;
            }
        </style>
        <div class="row-footer">
        <div class="col-6 lineheigh">
            <span class="pr">
                 <p>TECHNIAIN SIGN:</p>
                 <p>ROAD TEST:</p>           
            </span>
        </div>
        <div class="col-6 center lineheigh" >
            <span class="pl">
                 <p>عندما يكون للجودة معى</p>
                <p>THE MEAN OF QULITY</p>               
            </span>
        </div>
        </div>
    </div> 
    <script>
        function onPrint(){
            window.print();
        }
        preventDefaul
    </script>   
</body>
</html>



