<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function readNotif(){
        auth()->user()->unreadNotifications->markAsRead();

        //$mark = Auth()->user()->unreadNotifications->where('id', $notification)->first ();

    }
}
