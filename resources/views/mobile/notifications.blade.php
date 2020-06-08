<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="{{ asset('mobile/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('mobile/fonts/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('mobile/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('mobile/css/styles.min.css') }}">

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

    <div class="container-fluid" style="min-height: 100vh; ">

        <!--
            <div class="text-right text-primary mt-2 mb-1" >
            <span style="font-size: larger" onclick="markAllAsRead()">Mark all as read</span>
        </div>
        -->

        @foreach($notifications as $notification)
            @if ($notification->seen == 0)
                <div id="{{ $notification->id }}" class="notification shadow-sm p-3" style="background: rgb(0,204,232); border-radius: 2px" onclick="markAsRead('{{ $notification->id }}')">
                   <span class="mr-2">
                       <img src="{{ asset('mobile/bell.png') }}" alt="">
                   </span>
                    <span>
                        Your
                        <span class="text-primary" onclick="showDocunent('{{ $notification->deed_id }}')">
                            {{ $notification->deed_name }}
                        </span>
                        has been scanned by
                        <span class="text-primary" onclick="showProfile('{{ \App\AppUser::find($notification->scanner_id)->email }}')">
                            {{ $notification->scanner_name }}
                        </span>
                    </span>
                    <span class="ml-3 text-secondary">14:30, Sat</span>
                </div>
            @endif

            @if ($notification->seen == 1)
                    <div class="notification shadow-sm p-3 mt-2 bg-light" style=" border-radius: 2px">
                       <span class="mr-2">
                           <img src="{{ asset('mobile/bell.png') }}" alt="">
                       </span>
                            <span>
                            Your
                            <span class="text-primary" onclick="showDocunent('{{ $notification->deed_id }}')">
                                {{ $notification->deed_name }}
                            </span>
                            has been scanned by
                            <span class="text-primary" onclick="showProfile('{{ \App\AppUser::find($notification->scanner_id)->email }}')">
                                {{ $notification->scanner_name }}
                            </span>
                        </span>
                        <span class="ml-3 text-secondary">14:30, Sat</span>
                    </div>
            @endif

        @endforeach


    </div>

    <script src="{{ asset('mobile/js/jquery.min.js') }}"></script>
    <script src="{{ asset('mobile/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('mobile/js/pusher.min.js') }}"></script>
    <script src="{{ asset('mobile/js/masterscript.js') }}"></script>

    <script>

        unseenCount("{{ $unseenCount }}");

        function showProfile(theID) {
            //alert("Profile")
            JSReceiver.showProfile(theID);
        }

        function showDocunent(theID) {
            //alert("Document")
            JSReceiver.showDocunent(theID);
        }

        function markAsRead(theID) {
            console.log("Food");
            $.ajax({
                url:DOMAIN + "mobile/markasread/" + theID,
                type:"GET",
                success:function(response) {
                    console.log(response);
                    if(response.outcome == "done") {
                        //alert(theID);
                        document.getElementById(theID).style.background = "#f8f9fa";
                    }
                    else if (response.outcome == "failed"){

                    }

                },
                error:function(){

                }
            });
        }

        function markAllAsRead() {

        }

        function unseenCount(count) {
            //alert(count);
            JSReceiver.unseenCount(count);
        }

    </script>

</body>

</html>
