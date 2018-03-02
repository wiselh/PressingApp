<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'username' => "required|string|max:255|unique:users,$id",
            'email' => "required|string|max:255|unique:users,email,$id",
            'password' => 'string|min:6',
        ]);

        $admin = User::findOrFail($id);
        $pass='';
        if ($request->password==""){
            $qyr = DB::table('users')->where('id', $id)->first();
            $pass = $qyr->password;
        }else{
            $pass = bcrypt($request->password);
        }
        $admin->fullname=$request->fullname;
        $admin->username=$request->username;
        $admin->email=$request->email;
        $admin->tele=$request->tele;
        $admin->adresse=$request->adresse;
        $admin->password =$pass;

        $admin->save();
        return redirect('/commandes');
    }

}
