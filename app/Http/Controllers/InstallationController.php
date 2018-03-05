<?php

namespace App\Http\Controllers;


use App\Societe;
use App\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;



class InstallationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Installation.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD


        $user = new User;
        $societe = new Societe;

        $user->username=$request->username;
        $user->fullname=$request->user_name;
        $user->adresse=$request->user_adresse;
        $user->email=$request->user_email;
        $user->tele=$request->user_tele;

        $pic = Input::file('user_picture');
        if ($pic==null){
            $picture_local='assets/img/avatars/avatar.png';
        }else{
            $picture_name = $request->username.'.'.$request->user_picture->extension();
            $picture_local='assets/img/avatars/'.$picture_name;
            $pic->move('assets/img/avatars', $picture_name);
        }

        $user->picture=$picture_local;
=======
        $user = new User;
        $societe = new Societe;

        $user->username=$request->user_name;
        $user->fullname=$request->username;
        $user->adresse=$request->user_adresse;
        $user->email=$request->user_email;
        $user->tele=$request->user_tele;
>>>>>>> 0d4279e290f7da84f242b09682b016d9f6f70347
        $user->password=bcrypt($request->password);
        $user->admin='oui';

       $societe->societe_name=$request->societe_name;
       $societe->societe_adresse=$request->societe_adresse;
       $societe->societe_ville=$request->societe_ville;
       $societe->societe_tele=$request->societe_tele;
       $societe->societe_website=$request->societe_website;


        //upload logo
        $file = Input::file('societe_logo');
<<<<<<< HEAD
        $logo_name = $request->societe_name.'.'.$request->societe_logo->extension();
        $logo_local='assets/img/favicons/'.$logo_name;
        $file->move('assets/img/favicons', $logo_name);
=======
        $logo_name = $request->username.'.'.$request->societe_logo->extension();
        $logo_local='assets/img/avatars/'.$logo_name;
//        $file->move(asset('assets/img/avatars'), $logo_name);
        $file->move('assets/img/avatars', $logo_name);
>>>>>>> 0d4279e290f7da84f242b09682b016d9f6f70347
        $societe->societe_logo=$logo_local;

       $societe->societe_email=$request->societe_email;
       $societe->societe_description=$request->societe_description;

        $user->save();
        $societe->save();

        return redirect('/login');

    }



}
