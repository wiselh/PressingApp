<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

        public function __construct()
        {
            $this->middleware('auth');
        }

    public function updateAdmin(Request $request,$id){

        $admin = User::findOrFail($id);
        $pass='';
        if ($request->password==""){
            $qyr = DB::table('users')->where('id', $id)->first();
            $pass = $qyr->password;
        }else{
            $pass = bcrypt($request->password);
        }
//        die(var_dump($pass));
        $admin->name=$request->name;
        $admin->username=$request->username;
        $admin->password=$request->email;
        $admin->password =$pass;

        $admin->save();
        return redirect('/factures');
    }
}
