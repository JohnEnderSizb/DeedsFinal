<?php

namespace App\Http\Controllers;

use App\AppUser;
use App\Deed;
use App\DeedOwner;
use App\Events\MyNotification;
use App\Log;
use App\Notification;
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
        //verify if user exists //if user not exist, show a get lost page
        //if user exists, fetch the deed
        //if deed exists, save log and return not found
        //if deed exists, save log, save notification, send notification

        $theScannerExists = DB::table('app_users')->where('email', $request['email'])->value('id');
        if (!$theScannerExists) {
            return view('mobile.getLost');
        }


        $theScanner = DB::table('app_users')->where('email', $request['email'])->first();
        $result = DB::table('deeds')->where('id', $request['qrCode'])->value('id');
        if ($result) {
            $theDeed = Deed::find($result);
            $this->updateScanCount($theDeed);
            $this->saveLog($theDeed->id, $theScanner->id, 1);
            $this->saveNotification($theDeed->deed_owner_id, $theScanner->id, "scan", NULL, $theScanner->name, $theDeed->deed_title, $theDeed->id);

            $pusherMessage = "Your " . $theDeed->deed_title . " has been scanned by " . $theScanner->name;
            event(new MyNotification($pusherMessage, $theDeed->deedOwner->email));

            return response()->json(
                [
                    'outcome' => 'success',
                    'deed_title' => $theDeed->deed_title,
                    'conveyancer' => $theDeed->conveyancer->name,
                    'deed_owner' => $theDeed->deedOwner->name,
                    'length' => $theDeed->length,
                    'date_created' => $theDeed->date_created,
                    'date_added' => $theDeed->created_at,
                    'ref_num' => $theDeed->ref_num,
                    'summary' => $theDeed->description,

                    'phone' => "tel:" . $theDeed->deedOwner->phone,
                    'whatsapp' => "https://wa.me/" . substr($theDeed->deedOwner->whatsapp, 1),
                    'email' => "mailto:" . $theDeed->deedOwner->email,
                    'sms' => "sms:" . $theDeed->deedOwner->email,
                ]
            );
        }
        else {
            $this->saveLog(NULL, $theScanner->id, 0);
            return response()->json(['outcome' => 'none']);
        }
    }

    public function verificationVerify() {

    }

    public function verificationGenerate() {

    }


    public function pusherNotify($channel, $message){
        error_log("Foooooooooooooooooooooooooooooooooooooooooooooooooooood!!");
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

    public function logs() {
        $logs = DB::table('logs')->orderBy('id', 'desc')->paginate(15);
        return view('mobile.logs', compact('logs'));
    }

    public function notifications($email) {
        $theUser = AppUser::where('email', $email)
            ->first();
        $theUser = DB::table('app_users')->where('email', $email)->first();
        $notifications = DB::table('notifications')->orderBy('id', 'desc')->paginate(35);
        $unseenCount = 0;
        foreach ($notifications as $alert){
            if($alert->seen == 0 ) {
                $unseenCount = $unseenCount + 1;
            }
        }
        return view('mobile.notifications' , compact('notifications', 'unseenCount'));
    }

    public function markNotificationAsRead($notification) {
        $theNotification = Notification::find($notification);
        $theNotification->seen = 1;
        $theNotification->save();
        return response()->json(['outcome' => 'done']);
    }

    public function markAllAsRead($notification) {
        return view('mobile.notifications');
    }

    public function saveNotification($appUserID, $scannerID, $type, $message, $scanner_name, $deed_name, $deedID){
        $notification = new Notification();
        $notification->app_user_id = $appUserID;
        $notification->scanner_id = $scannerID;
        $notification->deed_id = $deedID;
        $notification->type = $type;
        $notification->message = $message;
        $notification->scanner_name = $scanner_name;
        $notification->deed_name = $deed_name;
        $notification->seen = 0;
        $notification->save();
    }

    public function saveLog($deedID, $appUserID, $wasFound ){
        $log = new Log();
        $log->deed_id = $deedID;
        $log->app_user_id = $appUserID;
        $log->wasFound = $wasFound;
        $log->save();
    }

    public function updateScanCount(Deed $theDeed){
        $theDeed->scanCount = $theDeed->scanCount + 1;
        $theDeed->save();
    }

    public function profile($email){
        $profile = DB::table('app_users')->where('email', $email)->first();
        return view('mobile.profile', compact("profile"));
    }

    public function othersProfile($email){
        $profile = DB::table('app_users')->where('email', $email)->first();
        return view('mobile.othersprofile', compact("profile"));
    }

    public function viewDocument($id){
        $document = Deed::find($id);
        //$document = DB::table('deeds')->where('id', $id)->first();
        return view('mobile.documentDetails', compact("document"));
    }

    public function userDocuments($email){
        $documents = DB::table('deeds')->orderBy('id', 'desc')->paginate(35);
        return view('mobile.documentsList', compact("documents"));
    }

    public function updateProfile(Request $request){
        $profile = AppUser::find($request->userID);

        $profile->name = $request->name;
        $profile->organisation = $request->organisation;
        $profile->position = $request->position;
        $profile->phone = $request->phone;
        $profile->whatsapp = $request->whatsapp;
        $profile->sms = $request->sms;
        $profile->city = $request->city;
        $profile->save();

        return redirect("/mobile/profile/$profile->email");

    }

    public function event(){
        event(new MyNotification('hello world', 'siziba.uz@gmail.com'));
        return "done";
    }


}
