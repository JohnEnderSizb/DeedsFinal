@extends('home')


@section('styling')
    <link rel="stylesheet" href="css/index_blade.css">
@endsection

@section('content')
    <div class="d-flex align-items-center">
        <h6 class="mg-b-0 tx-spacing--1 mr-5">
            <a href="/create">
                <button class="btn btn-outline-primary trigger" onclick="toggleModal()">NEW</button>
            </a>
        </h6>

        <div class="content-search mr-3">
            <i data-feather="search"></i>
            <input type="search" class="form-control bg-light shadow-sm" placeholder="Search...">
        </div>

        <div class="d-none d-md-block">
            <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="printer" class="wd-10 mg-r-5"></i> Print</button>
            <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="file" class="wd-10 mg-r-5"></i> Generate Report</button>
        </div>

    </div>
    <hr>

    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Tittle</th>
            <th>Conveyancer</th>
            <th>Ref Num</th>
            <th>Owner</th>
            <th>Description</th>
            <th>View</th>
        </tr>
        </thead>
        <tbody>

        @foreach($deeds as $deed)
            <tr>
                <td>
                    {{ $deed->id }}
                </td>

                <td>
                    {{ $deed->deed_title }}
                </td>

                <td>
                    {{ $deed->conveyancer_id }}
                </td>

                <td>
                    {{ $deed->ref_num }}
                </td>

                <td>
                    {{ $deed->deed_owner_id }}
                </td>

                <td>
                    {{ $deed->description }}
                </td>

                <td class="align-content-center text-center">
                    <a href="/view/{{ $deed->id }}" title="View Lorem ipsum dolor sit amet, consectetur adipisicing elit. 13/07/2020">
                        <i data-feather="eye" style="color: #0168f8"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <caption class="text-center">
            {{ $deeds->links() }}
        </caption>
    </table>

@endsection

@section('scripts')

@endsection
