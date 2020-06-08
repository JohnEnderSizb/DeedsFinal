<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="{{ asset('mobile/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('mobile/fonts/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('mobile/css/animate.min.css') }}">

    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012'),
            linear-gradient(to bottom, #ffffff 0%,#e5e5e5 100%);
            background-repeat: no-repeat, repeat;
            background-position: right .7em top 50%, 0 0;
            background-size: .65em auto, 100%;
        }
    </style>
</head>

<body>
    <div class="container" id="results" style="min-height: 100vh; ">

        <div class="jello animated illustration text-center mb-3 mt-2">
            <img src="{{ asset('mobile/logo.png') }}" alt="" style="height: 90px" class="rounded-circle shadow">
        </div>

        <h3 class="text-black text-center text-capitalize mt-2" style="text-shadow: #213458 0.05em 0.05em 0.06em;" id="title">
            {{ $document->deed_title }}
        </h3>

        <table class="table table-bordered">
            <tr>
                <td>Ref. Num</td>
                <td>
                    {{ $document->ref_num }}
                </td>
            </tr>

            <tr>
                <td>Length</td>
                <td>
                    {{ $document->length }}
                </td>
            </tr>

            <tr>
                <td>Conveyancer</td>
                <td>
                    {{ $document->conveyancer->name }}
                </td>
            </tr>

            <tr>
                <td>Deed Creation Date</td>
                <td>
                    {{ $document->date_created }}
                </td>
            </tr>

            <tr>
                <td>Date Added</td>
                <td>
                    {{ $document->created_at }}
                </td>
            </tr>


        </table>


        <p class="text-dark" id="summary">
            {{ $document->description }}
        </p>
        <hr>
        <h4 class="text-dark">Number of scans: {{ $document->scanCount }}</h4>

        <br><br><br>
    </div>


    <script src="{{ asset('mobile/js/jquery.min.js') }}"></script>
    <script src="{{ asset('mobile/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('mobile/js/pusher.min.js') }}"></script>
    <script src="{{ asset('mobile/js/masterscript.js') }}"></script>

    <script>
        function scanNext(){
            return JSReceiver.scanNext();
        }

        function home(){
            return JSReceiver.home();
        }


        function getQrCode(){
            return JSReceiver.getQrCode();
        }

        function getUserEmail(){
            return JSReceiver.getUserEmail()
        }

        $(document).ready(function() {
            fetchDeed()
        });

        function fetchDeed(){
            JSReceiver.openProgDialog();
            $.ajax({
                url:DOMAIN + "app/deeds/fetch",
                type:"POST",
                data:{
                    qrCode: getQrCode(),
                    email: getUserEmail(),
                },
                success:function(response) {
                    console.log(response);
                    JSReceiver.closeProgDialog();
                    if(response.outcome == "success") {
                        //display
                        $('#title').text(response.deed_title);
                        $('#conveyancer').text(response.conveyancer);
                        $('#parties').text(response.deed_owner);
                        $('#ref_num').text(response.ref_num);
                        //$('#date').text(response.title);
                        $('#summary').text(response.summary);
                        $('#results').show('fast');
                    }
                    else if (response.outcome == "none"){
                        $('#none').show('fast');
                    }

                },
                error:function(){
                    JSReceiver.closeProgDialog();
                    JSReceiver.openErrorDialog();
                }
            });

        }
    </script>

</body>

</html>
