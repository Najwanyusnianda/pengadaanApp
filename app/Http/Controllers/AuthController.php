<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Person;
use App\User;

class AuthController extends Controller
{
    //
    public function getLogin(){
        return view('Authh.login');
    }

    public function getRegister(){
        return view('Authh.register');
    }

    public function postLogin(Request $request){
        if(!Auth::attempt(['username' => $request->username, 'password' => $request->password ])){
            return redirect()->back();
        }
        return redirect()->route('bagian.index');

    }

    public function postRegister(Request $request){
        $user=User::create([
            'username'=>$request->username,
            'password'=>bcrypt($request->password),
            'is_user'=>true,
           
        ]);

        $person=Person::create([
            'nama_depan' =>$request->nama,
            'nama_belakang'=>'test',
            'nip' => $request->nip,
            //'role_id' => $request->role_id,
            'user_id' => $user->id,
            'role_id'=>1
        ]);

        return redirect()->route('login');


    }

    

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
