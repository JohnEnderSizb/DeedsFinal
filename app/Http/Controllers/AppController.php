<?php

namespace App\Http\Controllers;

use App\AppUser;
use App\Deed;
use App\DeedOwner;
use App\ScanActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;

class AppController extends Controller
{
    public function signIn(Request $request) {
        $result = DB::table('app_users')->where('password', $request['password'])->where('email', $request['email'])->value('email');

        if ($result) {
            return response()->json(['outcome' => 'success']);
        }
        else {
            return response()->json(['outcome' => 'none']);
        }
    }

    public function signUp(Request $request) {
        $result = DB::table('app_users')->where('email', $request['email'])->value('email');

        if ($result) {
            return response()->json(['outcome' => 'exist']);
        }
        else {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|unique:app_users',
                'organisation' => 'required',
                'position' => 'required',
                'password' => 'required',
            ]);
            AppUser::create($validatedData);

            return response()->json(['outcome' => 'success', 'state' => 'CA']);
        }

    }

    public function fetchDeed(Request $request) {


        $result = DB::table('deeds')->where('id', $request['qrCode'])->value('id');

        if ($result) {
            $theDeed = Deed::find($result);

            $scanActivity = new ScanActivity();
            $scanActivity->deed_owner = $theDeed->deed_owner_id;
            //$scanActivity->deed_title = $theDeed->deed_title;
            $scanActivity->deed_title = 1;
            $scanActivity->conveyancer = $theDeed->conveyancer_id;
            $scanActivity->scanner = $request['email'];
            $scanActivity->save();


            $theScanner = DB::table('app_users')->where('email', $request['email'])->first();

            $channel = $request['email'];
            $deedOwner = DeedOwner::find($theDeed->deed_owner_id);
            $channel = $deedOwner->email;
            $notify_message = json_encode(array(
                'id' => $scanActivity->id,
                'scanner_name' => $theScanner->name,
                'scanner_email' => $theScanner->email,
                'deed_title' => $scanActivity->deed_title,
                'created_at' => $scanActivity->created_at,
            ), JSON_FORCE_OBJECT);

            $this->pusherNotify($channel, $notify_message);

            return response()->json(
                [
                    'outcome' => 'success',
                    'deed_title' => $theDeed->deed_title,
                    'conveyancer' => DB::table('conveyancers')->where('id', $theDeed->conveyancer_id)->value('name'),
                    'deed_owner' => $deedOwner->name,
                    'ref_num' => $theDeed->ref_num,
                    'summary' => $theDeed->description
                ]
            );
        }
        else {
            return response()->json(['outcome' => 'none']);
        }
    }

    public function verificationVerify() {

    }

    public function verificationGenerate() {

    }


    public function pusherNotify($channel, $message){
        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data['message'] = $message;
        $pusher->trigger($channel, 'App\\Events\\Notify', $data);
    }

}
