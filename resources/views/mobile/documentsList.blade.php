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

    <div class="list-group">

        @foreach($documents as $document)
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start" onclick="viewDocument({{ $document->id }})">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $document->deed_title }}</h5>
                    <small class="text-muted">
                        {{ \Carbon\Carbon::createFromTimeStamp(strtotime($document->created_at))->diffForHumans() }}
                    </small>
                </div>
                <p class="mb-1">
                    {{ strlen($document->description) > 100 ? substr($document->description,0,100)."..." : $document->description }}
                </p>
                <small class="text-muted">{{ $document->scanCount }} Scans</small>
            </a>
        @endforeach

    </div>

</div>

<script src="{{ asset('mobile/js/jquery.min.js') }}"></script>
<script src="{{ asset('mobile/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('mobile/js/pusher.min.js') }}"></script>
<script src="{{ asset('mobile/js/masterscript.js') }}"></script>

<script>

    function viewDocument( theID ) {
        JSReceiver.viewDocument( theID );
    }


</script>

</body>

</html>
