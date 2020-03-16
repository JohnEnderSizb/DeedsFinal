<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pusher\Pusher;

class TestController extends Controller
{
    public function notify(){
        $this->pusherNotify("siziba", "Lorem Ipsum J");
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
