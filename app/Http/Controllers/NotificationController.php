<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function __construct()
    {
        // $this->middleware('auth');
    }
  
    public function send(Request $request)
    {
        $employees = DB::table('voucher_requests')->where(['Role' => 0])->get();
        $user = User::first();
  
        $details = [
            'greeting' => 'Hi Artisan',
            'body' => 'This is my first notification from HackTheStuff',
            'thanks' => 'Thank you for using HackTheStuff article!',
            'actionText' => 'View My Site',
            'actionURL' => url('https://hackthestuff.com')
        ];
  
        Notification::send($user, new DemoNotification($details));
   
        dd('Your notification send seuccessfully!');
    }  
}
