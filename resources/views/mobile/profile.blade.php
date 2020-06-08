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
    <div class="jello animated illustration text-center mt-2">
        <img src="{{ asset('mobile/logo.png') }}" alt="" style="height: 90px" class="rounded-circle shadow">
    </div>

    <div>
        <div id="profileView">
            <h3 class="text-center">{{ $profile->name }}</h3>
            <table class="table table-bordered">
                <tr>
                    <td>Email</td>
                    <td>
                        {{ $profile->email }}
                    </td>
                </tr>

                <tr>
                    <td>Phone</td>
                    <td>
                        {{ $profile->phone }}
                    </td>
                </tr>

                <tr>
                    <td>WhatsApp</td>
                    <td>
                        {{ $profile->whatsapp }}
                    </td>
                </tr>

                <tr>
                    <td>SMS</td>
                    <td>
                        {{ $profile->sms }}
                    </td>
                </tr>

                <tr>
                    <td>Organisation</td>
                    <td>
                        {{ $profile->organisation }}
                    </td>
                </tr>

                <tr>
                    <td>Position</td>
                    <td>
                        {{ $profile->position }}
                    </td>
                </tr>

                <tr>
                    <td>City</td>
                    <td>
                        {{ $profile->city }}
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <button id="editButton" class="btn btn-primary" style="background: #213458">Edit</button>
                    </td>
                </tr>
            </table>
        </div>


        <div id="profileEdit" style="display: none">
            <p class="text-center">
                <button id="backButton" class="btn btn-primary" style="background: #213458">Back</button>
            </p>
            <form action="/mobile/update/profile" method="POST">
                @csrf

                <input type="hidden" name="userID" value="{{ $profile->id }}">

                <h3 class="text-center">
                    <input name="name" required value="{{ $profile->name }}" class="form-control" type="text">
                </h3>
                <table class="table table-bordered">

                    <tr>
                        <td>Phone</td>
                        <td>
                            <input name="phone" required value="{{ $profile->phone }}" class="form-control" type="tel">
                        </td>
                    </tr>

                    <tr>
                        <td>WhatsApp</td>
                        <td>
                            <input name="whatsapp" value="{{ $profile->whatsapp }}" required  class="form-control" type="tel">
                        </td>
                    </tr>

                    <tr>
                        <td>SMS</td>
                        <td>
                            <input name="sms" value="{{ $profile->sms }}" required  class="form-control" type="tel">
                        </td>
                    </tr>

                    <tr>
                        <td>Organisation</td>
                        <td>
                            <input name="organisation" value="{{ $profile->organisation }}" required class="form-control" type="text">
                        </td>
                    </tr>

                    <tr>
                        <td>Position</td>
                        <td>
                            <input name="position" value="{{ $profile->position }}" required class="form-control" type="text">
                        </td>
                    </tr>

                    <tr>
                        <td>City</td>
                        <td>
                            <input name="city" value="{{ $profile->name }}" required class="form-control" type="text">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <button class="btn btn-primary" type="submit" style="background: #213458">Submit</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

</div>

<script src="{{ asset('mobile/js/jquery.min.js') }}"></script>
<script src="{{ asset('mobile/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('mobile/js/pusher.min.js') }}"></script>
<script src="{{ asset('mobile/js/masterscript.js') }}"></script>

<script>

    $(document).ready(function() {
        // document is loaded and DOM is ready

    });

    $('#editButton').click(function(){
        $('#profileView').toggle("fast");
        $('#profileEdit').toggle("fast");
    });

    $('#backButton').click(function(){
        $('#profileView').toggle("fast");
        $('#profileEdit').toggle("fast");
    });


</script>

</body>

</html>
