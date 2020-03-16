<?php

namespace App\Http\Controllers;

use App\Conveyancer;
use App\Deed;
use App\DeedOwner;
use App\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MainController extends Controller
{
    public function index() {
        //$deeds = Deed::all();
        $deeds = DB::table('deeds')->orderBy('id', 'desc')->paginate(15);

        return view('index',compact('deeds'));
    }

    public function newView() {

    }
    public function create() {
        return view('create');
    }

    public function processCreate(Request $request) {

        $conveyancer = Conveyancer::updateOrCreate(['email' => $request['conveyancer_email']], [
            'name' => $request['conveyancer_name']
        ]);

        $owner = DeedOwner::updateOrCreate(['email' => $request['owner_email']], [
            'name' => $request['owner_name']
        ]);



        $deed = new Deed();
            $deed->conveyancer_id = $conveyancer->id;
            $deed->deed_owner_id = $owner->id;
            $deed->deed_title = $request['deed_title'];
            $deed->ref_num = $request['ref_num'];
            $deed->date_created = $request['date_created'];
            $deed->length = $request['length'];
            $deed->description = $request['description'];

            $deed->save();

        return redirect('/home');

    }

    public function view( Deed $deed ) {
        $image = QrCode::format('png')->merge("logo.png", 0.3, true)
            ->size(200)->errorCorrection('H')->color(64, 64, 173)
            ->generate($deed->id);
        return view("view", compact("deed", "image"));
    }

    public function qr_code($qr_code) {
        $pngImage = QrCode::format('png')
            ->size(500)->errorCorrection('H')->color(64, 64, 173)
            ->generate($qr_code);

        return response($pngImage)->header('Content-type','image/png');
    }

    public function editDeedView() {

    }
    public function editDeed() {

    }

    function generateRandomString($n) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
}
