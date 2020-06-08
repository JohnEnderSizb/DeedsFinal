<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        return view("dashboard");
    }

    public function notifications(){
        return view("notifications");
    }

    public function logs(){
        return view("logs");
    }





    public function deeds(){
        $deeds = DB::table('deeds')->orderBy('id', 'desc')->paginate(15);
        return view("deeds", compact("deeds"));
    }

    public function register(){
        return view("register");
    }

    public function details(){
        return view("details");
    }
}
