<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class NotificationController extends Controller
{
    //
    public function index(){
        $notif=auth()->user()->notifications()->paginate(5);
        
        return view('notifikasi.list_notifikasi')->with('notif',$notif);
    }

    public function readNotif(){
        auth()->user()->unreadNotifications->markAsRead();

        //$mark = Auth()->user()->unreadNotifications->where('id', $notification)->first ();

    }
}
