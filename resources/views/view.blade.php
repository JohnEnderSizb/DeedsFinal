@extends('home')

@section('styling')
    <style type="text/css">


    </style>


@endsection

@section('content')

    <div class="row mb-2">
        <div class="col-md-2"></div>

        <div class="col-md-8">
            <div class="">
                <div class="card flex-md-row mb-4 h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <h3 class="mb-0">
                            <a class="text-dark" href="#">{{ $deed->deed_title }}</a>
                        </h3>
                        <div class="mb-1 text-muted">
                            <h4>
                                <span class="text-primary"> Ref. Num: </span>
                                {{ $deed->ref_num }}
                            </h4>
                        </div>
                    </div>
                </div>
                <br>
                <h4 class="text-primary">Description</h4>
                <p>
                    {{ $deed->description }}
                </p>
                <hr>
                <h4 class="text-primary">Options</h4>
                <table>
                    <tr>
                        <td> <button class="btn btn-outline-info">Send QR-Code Via Email</button> </td>
                        <td>
                            <a href="/view/qr_code/{{ $deed->id }}" download="qr_code_{{ $deed->id }}">
                                <button class="btn btn-outline-info">Download QR-Code</button>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>



        <div class="col-md-2"></div>

    </div>

@endsection

@section('scripts')

@endsection
