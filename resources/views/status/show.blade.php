<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">


</head>

<body>


    <style>
        table tr td {
            font-size: 18px;
            font-weight: bold;
        }

        table tr td b {
            font-size: 22px;
            color: red;

        }

        .result div {
            color: blue;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12 justify-content-md-center">
                <table class="table">
                    <tr>
                        <td><b>JOB CARD NUMBER</b></td>
                        <td><b>JOB CARD STATUS</b></td>
                        <td><b>حالة السيارة</b></td>
                        <td><b>الوقت</b></td>
                    </tr>
                    <tr class="result">
                        <td>
                            <div id="ro0"></div>
                        </td>
                        <td>
                            <div id="status0"></div>
                        </td>
                        <td>
                            <div id="status_ar0"></div>
                        </td>
                        <td>
                            <div id="updated0"></div>
                        </td>
                    </tr>
                    <tr class="result">
                        <td>
                            <div id="ro1"></div>
                        </td>
                        <td>
                            <div id="status1"></div>
                        </td>
                        <td>
                            <div id="status_ar1"></div>
                        </td>
                        <td>
                            <div id="updated1"></div>
                        </td>
                    </tr>
                    <tr class="result">
                        <td>
                            <div id="ro2"></div>
                        </td>
                        <td>
                            <div id="status2"></div>
                        </td>
                        <td>
                            <div id="status_ar2"></div>
                        </td>
                        <td>
                            <div id="updated2"></div>
                        </td>
                    </tr>
                    <tr class="result">
                        <td>
                            <div id="ro3"></div>
                        </td>
                        <td>
                            <div id="status3"></div>
                        </td>
                        <td>
                            <div id="status_ar3"></div>
                        </td>
                        <td>
                            <div id="updated3"></div>
                        </td>
                    </tr>
                    <tr class="result">
                        <td>
                            <div id="ro4"></div>
                        </td>
                        <td>
                            <div id="status4"></div>
                        </td>
                        <td>
                            <div id="status_ar4"></div>
                        </td>
                        <td>
                            <div id="updated4"></div>
                        </td>
                    </tr>
                    <tr class="result">
                        <td>
                            <div id="ro5"></div>
                        </td>
                        <td>
                            <div id="status5"></div>
                        </td>
                        <td>
                            <div id="status_ar5"></div>
                        </td>
                        <td>
                            <div id="updated5"></div>
                        </td>
                    </tr>
                    <tr class="result">
                        <td>
                            <div id="ro6"></div>
                        </td>
                        <td>
                            <div id="status6"></div>
                        </td>
                        <td>
                            <div id="status_ar6"></div>
                        </td>
                        <td>
                            <div id="updated6"></div>
                        </td>
                    </tr>
                    <tr class="result">
                        <td>
                            <div id="ro7"></div>
                        </td>
                        <td>
                            <div id="status7"></div>
                        </td>
                        <td>
                            <div id="status_ar7"></div>
                        </td>
                        <td>
                            <div id="updated7"></div>
                        </td>
                    </tr>
                    <tr class="result">
                        <td>
                            <div id="ro8"></div>
                        </td>
                        <td>
                            <div id="status8"></div>
                        </td>
                        <td>
                            <div id="status_ar8"></div>
                        </td>
                        <td>
                            <div id="updated8"></div>
                        </td>
                    </tr>
                    <tr class="result">
                        <td>
                            <div id="ro9"></div>
                        </td>
                        <td>
                            <div id="status9"></div>
                        </td>
                        <td>
                            <div id="status_ar9"></div>
                        </td>
                        <td>
                            <div id="updated9"></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>


    <script>
        $(document).ready(function() {
            
            function getData() {

                $.ajax({
                    type: 'GET',
                    url: "{{ route('status.json') }}",
                    success: function(data) {
                        // console.log(data)
                        $('#ro0').text(data[0].id)
                        $('#status0').text(data[0].status)
                        $('#status_ar0').text(data[0].status_ar)
                        $('#updated0').text(data[0].updated_at.substring(10))

                        if (data[1]) {
                            $('#ro1').text(data[1].id)
                            $('#status1').text(data[1].status)
                            $('#status_ar1').text(data[1].status_ar)
                            $('#updated1').text(data[1].updated_at.substring(10))
                        }

                        if (data[2]) {
                            $('#ro2').text(data[2].id)
                            $('#status2').text(data[2].status)
                            $('#status_ar2').text(data[2].status_ar)
                            $('#updated2').text(data[2].updated_at.substring(10))
                        }

                        if (data[3]) {
                            $('#ro3').text(data[3].id)
                            $('#status3').text(data[3].status)
                            $('#status_ar3').text(data[3].status_ar)
                            $('#updated3').text(data[3].updated_at.substring(10))
                        }

                        if (data[4]) {
                            $('#ro4').text(data[4].id)
                            $('#status4').text(data[4].status)
                            $('#status_ar4').text(data[4].status_ar)
                            $('#updated4').text(data[4].updated_at.substring(10))
                        }

                        if (data[5]) {
                            $('#ro5').text(data[5].id)
                            $('#status5').text(data[5].status)
                            $('#status_ar5').text(data[5].status_ar)
                            $('#updated5').text(data[5].updated_at.substring(10))
                        }

                        if (data[6]) {
                            $('#ro6').text(data[6].id)
                            $('#status6').text(data[6].status)
                            $('#status_ar6').text(data[6].status_ar)
                            $('#updated6').text(data[6].updated_at.substring(10))
                        }

                        if (data[7]) {
                            $('#ro7').text(data[7].id)
                            $('#status7').text(data[7].status)
                            $('#status_ar7').text(data[7].status_ar)
                            $('#updated7').text(data[7].updated_at.substring(10))
                        }

                        if (data[8]) {
                            $('#ro8').text(data[8].id)
                            $('#status8').text(data[8].status)
                            $('#status_ar8').text(data[8].status_ar)
                            $('#updated8').text(data[8].updated_at.substring(10))
                        }

                        if (data[9]) {
                            $('#ro9').text(data[9].id)
                            $('#status9').text(data[9].status)
                            $('#status_ar9').text(data[9].status_ar)
                            $('#updated9').text(data[9].updated_at.substring(10))
                        }

                    }
                })

            }

            setInterval(getData, 3000)

            $('#status').text('test')
        });
    </script>
</body>

</html>