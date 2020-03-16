@extends('home')

@section('styling')

@endsection

@section('content')
    <!--
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
    -->

    <div class="card">
        <div class="card-header bg-secondary shadow-sm">
            <h4 class="text-light font-weight-bold"> Register New Deed</h4>
        </div>
        <form class="search-form" style="" method="POST" action="/processCreate">
            @csrf
            <div class="card-body bg-light">
                <table class="table table-borderless">
                    <tr>
                        <td colspan="2">
                            <h5 class="text-black"> Deed</h5>
                        </td>
                    </tr>
                    <tr class="text-dark">

                        <td>
                            <div class="input-group align-content-center">
                                <label for="deed-title" class="mt-2 mr-2">Title: </label>
                                <input type="text" class="form-control font-weight-bold" required name="deed_title" placeholder="Tittle of the deed">
                            </div>
                        </td>

                        <td>
                            <div class="input-group align-content-center">
                                <label for="ref_num" class="mt-2 mr-2">Ref Num: </label>
                                <input type="text" class="form-control font-weight-bold" required name="ref_num" placeholder="Deed Reference Number">
                            </div>
                        </td>

                    </tr>

                    <tr class="text-dark">

                        <td>
                            <div class="input-group align-content-center">
                                <label for="title" class="mt-2 mr-2">Date: </label>
                                <input type="text" class="form-control font-weight-bold"  name="date_created" placeholder="Date Created" required>
                            </div>
                        </td>

                        <td>
                            <div class="input-group align-content-center">
                                <label for="length" class="mt-2 mr-2">Length: </label>
                                <input type="text" class="form-control ml-2 font-weight-bold" required name="length" placeholder="Length/Number of Pages">
                            </div>
                        </td>

                    </tr>

                    <tr class="text-dark">
                        <td colspan="2">
                            <div class="input-group">
                                <label for="description" class="mt-3 mr-2">Description: </label> <br>
                                <textarea name="description" class="form-control font-weight-bold" placeholder="Description" style="height: 80px" required></textarea>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <hr>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <h5 class="text-black"> OWNER</h5>
                        </td>
                    </tr>

                    <tr class="text-dark">

                        <td>
                            <div class="input-group align-content-center">
                                <label for="owner-name" class="mt-2 mr-2">Name/Organisation </label>
                                <input type="text" class="form-control font-weight-bold" required name="owner_name" placeholder="Name of Individual or Organisation">
                            </div>
                        </td>

                        <td>
                            <div class="input-group align-content-center">
                                <label for="owner-title" class="mt-2 mr-2">Email: </label>
                                <input type="email" class="form-control font-weight-bold" required name="owner_email" placeholder="Email">
                            </div>
                        </td>

                    </tr>


                    <tr>
                        <td colspan="2">
                            <hr>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <h5 class="text-black"> CONVEYANCER</h5>
                        </td>
                    </tr>

                    <tr class="text-dark">

                        <td>
                            <div class="input-group align-content-center">
                                <label for="conveyancer_name" class="mt-2 mr-2">Name: </label>
                                <input type="text" class="form-control font-weight-bold" required name="conveyancer_name" placeholder="Conveyancer Name">
                            </div>
                        </td>

                        <td>
                            <div class="input-group align-content-center">
                                <label for="conveyancer_email" class="mt-2 mr-2">Email: </label>
                                <input type="email" class="form-control font-weight-bold" required name="conveyancer_email" placeholder="Conveyancer Email">
                            </div>
                        </td>

                    </tr>

                    <tr>
                        <td colspan="2">
                            <hr>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <div class="card-footer bg-secondary" style="border-radius: 4px">
                                <input class="btn btn-dark font-weight-bold" type="submit" value="SUBMIT">
                            </div>
                        </td>
                    </tr>

                </table>
            </div>

        </form><!-- search-form -->
    </div>


    <!--
    OK so
    1. TITTLE -these are the types of titles we have which are subject to circumstances around the transfer(a. Deed of grant
    b. Tittle deed
    c. Estate transfer
    d.Deed of partition
    e. Certificate of       registered tittle
    f. certificate of consolidated tittle
    g.  Sale in execution


    2. CONVEYANCER- name of conveyancer and the name of the law firm
    3. OWNER _Transferor  and I. D number, Transferee and I. D number (these can also be judicial persons e.g companies, estates,universities, corperatives etc

    4. DESCRIPTION-  CERTAIN      piece of land situate in the District of Salisbury;

    BEING           STAND 1583 SALISBURY TOWNSHIP;

    MEASURING           Four Thousand Two Hundred and Eighty Seven conditional clause -describes the burdens (if any) that are on the land

    5....please add a mortgage bond column cause some tittle deeds may have those registered on them
    -->

@endsection

@section('scripts')

@endsection
