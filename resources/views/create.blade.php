@extends('home')

@section('styling')
    <style type="text/css">
        .select-css {
            display: block;
            font-size: 16px;
            font-family: sans-serif;
            font-weight: 700;
            color: #444;
            line-height: 1.3;
            padding: .6em 1.4em .5em .8em;
            width: 100%;
            max-width: 100%;
            box-sizing: border-box;
            margin: 0;
            border: 1px solid #aaa;
            box-shadow: 0 1px 0 1px rgba(0,0,0,.04);
            border-radius: .5em;
            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
            background-color: #fff;
            background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),
            linear-gradient(to bottom, #ffffff 0%,#e5e5e5 100%);
            background-repeat: no-repeat, repeat;
            background-position: right .7em top 50%, 0 0;
            background-size: .65em auto, 100%;
        }
        .select-css::-ms-expand {
            display: none;
        }
        .select-css:hover {
            border-color: #888;
        }
        .select-css:focus {
            border-color: #aaa;
            box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);
            box-shadow: 0 0 0 3px -moz-mac-focusring;
            color: #222;
            outline: none;
        }
        .select-css option {
            font-weight:normal;
        }


        .form-style-9{
            max-width: 80%;
            background: #FFF;
            padding: 30px;
            margin: 50px auto;
            border-radius: 4px;
            color: #222;

        }
        .form-style-9 ul{
            padding:0;
            margin:0;
            list-style:none;
        }
        .form-style-9 ul li{
            display: block;
            margin-bottom: 10px;
            min-height: 35px;
        }
        .field-style{
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            padding: 8px;
            outline: none;
            border: 1px solid #0168f8;
            -webkit-transition: all 0.30s ease-in-out;
            -moz-transition: all 0.30s ease-in-out;
            -ms-transition: all 0.30s ease-in-out;
            -o-transition: all 0.30s ease-in-out;


        .form-style-9 ul li .field-full{
            width: 100%;
        }
        .form-style-9 ul li input.align-left{
            float:left;
        }
        .form-style-9 ul li input.align-right{
            float:right;
        }
        .form-style-9 ul li textarea{
            width: 100%;
            height: 100px;
        }



    </style>


@endsection

@section('content')

    <div class="container">
        <form class="form-style-9 shadow-sm bg-light" autocomplete="on" method="POST" action="/processCreate">
            @csrf
            <h3 class="text-center" style="color: #0168f8">Register New Deed on DeedScan</h3>
            <hr>
            <br>
            <table class="table table-borderless">
                <tr>
                   <td colspan="2">
                       <input type="text" name="title" placeholder="Title" class="form-control field-style" required>
                   </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="text" name="conveyancer" placeholder="Conveyancer" class="form-control field-style" required>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="text" name="ref_num" placeholder="Ref. Number" class="form-control field-style" required>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="text" name="owner" placeholder="Owner" class="form-control field-style" required>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <textarea name="description" class="form-control field-style" placeholder="Description" style="height: 100px" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" class="btn btn-outline-info">Submit</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <br>
    <hr>
    <br>

@endsection
Today I'm working on a Leave Management System. There is
@section('scripts')

@endsection
