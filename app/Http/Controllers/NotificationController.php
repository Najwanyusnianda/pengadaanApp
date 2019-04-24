<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function readNotif(){
        //auth()->user()->unreadNotifications->markAsRead();

        $notification = auth()->user()->notifications()->find($notificationid);
        if($notification) {
            $notification->markAsRead();
        }
    }
}
