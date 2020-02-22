<?php

namespace App\Http\Controllers;

use App\AppUser;
use App\Deed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $result = DB::table('deeds')->where('qr_code', $request['qrCode'])->value('id');

        if ($result) {
            $theDeed = Deed::find($result);
            return response()->json(
                [
                    'outcome' => 'success',
                    'title' => $theDeed->title,
                    'conveyancer' => $theDeed->conveyancer,
                    'parties' => $theDeed->owner,
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


}
