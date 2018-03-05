<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Validator;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id){

        $user = User::findOrFail($id);

//        $this->validate($request, [
//            'profile_username' => "required|string|min:6|unique:username,$id",
//            'profile_email' => "required|email|unique:email,$id"
//        ]);

        if ($request->hasFile('profile_picture')) {
            $pic = $request->profile_picture;
            $picture_name = $request->username.'.'.$request->profile_picture->extension();
            $picture_local='assets/img/avatars/'.$picture_name;
            $pic->move('assets/img/avatars', $picture_name);
            $user->picture=$picture_local;
        }
        $user->fullname=$request->profile_fullname;
        $user->username=$request->profile_username;
        $user->email=$request->profile_email;
        $user->tele=$request->profile_tele;
        $user->adresse=$request->profile_adresse;
        $user->save();
        return redirect('/commandes');
    }


    public function updatePassword(Request $request,$id){

        $this->validate($request, [
            'profile_password' => 'required|string|min:6',
            'profile_confirm_password' => 'required|same:profile_password|min:6'
        ]);
        $user = User::findOrFail($id);
        $user->password=bcrypt($request->profile_password);
        $user->save();
        return redirect('/commandes');


    }

}
