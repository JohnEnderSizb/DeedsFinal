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

    </style>
</head>

<body>
    <h>Food</h>
    <div class="container" id="results" style="min-height: 100vh; ">
        <table class="table" style="font-family: Arial,serif">
            @foreach($logs as $log)
                @if ($log->wasFound == 1)
                    <tr>
                        <td>
                            <div class="mt-1">
                                <p>
                                    <img src="{{ asset('mobile/success.png') }}" alt="">
                                </p>
                            </div>
                        </td>

                        <td>
                            <span>Scan: {{ App\Deed::find($log->deed_id)->deed_title }}</span>
                            <br>
                            <span class="text-secondary">{{ $log->created_at }}</span>
                        </td>
                    </tr>
                @endif

                @if ($log->wasFound == 0)
                        <tr>
                            <td>
                                <div class="mt-1">
                                    <p>
                                        <img src="{{ asset('mobile/fail.png') }}" alt="">
                                    </p>
                                </div>
                            </td>

                            <td>
                                <span>Failed scan: document not found.</span>
                                <br>
                                <span class="text-secondary">{{ $log->created_at }}</span>
                            </td>
                        </tr>
                @endif
            @endforeach



        </table>

    </div>

    <script src="{{ asset('mobile/js/jquery.min.js') }}"></script>
    <script src="{{ asset('mobile/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('mobile/js/masterscript.js') }}"></script>


    <script>

    </script>

</body>

</html>
