<?php

namespace App\Http\Controllers;

use App\Deed;
use App\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MainController extends Controller
{
    public function index() {
        //$deeds = Deed::all();
        $deeds = DB::table('deeds')->paginate(15);

        return view('index',compact('deeds'));
    }

    public function newView() {

    }
    public function create() {
        return view('create');
    }

    public function processCreate(Request $request) {

        $randomNumber = rand(1000000000000000,9999999999999999);

        $qr_code = $request["ref_num"] . $randomNumber;


        $deed = new Deed();
            $deed->title = $request['title'];
            $deed->conveyancer = $request['conveyancer'];
            $deed->ref_num = $request['ref_num'];
            $deed->qr_code = $qr_code;
            $deed->owner = $request['owner'];
            $deed->description = $request['description'];

            $deed->save();

        return redirect('/home');

    }

    public function view( Deed $deed ) {
        $image = QrCode::format('png')->merge("logo.png", 0.3, true)
            ->size(200)->errorCorrection('H')->color(64, 64, 173)
            ->generate($deed->qr_code);
        return view("view", compact("deed", "image"));
    }

    public function qr_code($qr_code) {
        $pngImage = base64_encode(QrCode::format('png')->merge('logo.png', 0.3, true)
            ->size(500)->errorCorrection('H')->color(64, 64, 173)
            ->generate($qr_code));

        return response($pngImage)->header('Content-type','image/png');
    }

    public function editDeedView() {

    }
    public function editDeed() {

    }
}
