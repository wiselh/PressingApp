<?php

namespace App\Http\Controllers;

use App\Societe;
use FontLib\EOT\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Model;

class SocieteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $societe = Societe::all()->first();
        return view('Pages.Societe.index',['societe'=>$societe]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $societe = Societe::all()->first();
        return view('Pages.Societe.index',['societe'=>$societe]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $logo = Input::file('societe_logo');
        $get_location = Societe::find($id);

        if ($logo==null){
            $societe_logo_local=$get_location->societe_logo;
        }else{

            //delete old one
            $this->deleteOldLogo($get_location->societe_logo);
            $picture_name = 'logo.'.$request->societe_logo->extension();
            $societe_logo_local='assets/img/favicons/'.$picture_name;
            $logo->move('assets/img/favicons', $picture_name);
        }

        DB::table('societes')
            ->where('id_societe', $id)
            ->update(
                [
                    'societe_name' => $request->societe_name,
                    'societe_adresse' => $request->societe_adresse,
                    'societe_city' => $request->societe_city,
                    'societe_tele' => $request->societe_tele,
                    'societe_email' => $request->societe_email,
                    'societe_website' => $request->societe_website,
                    'societe_logo' => $societe_logo_local,
                    'societe_description' => $request->societe_description,
                    'societe_cnss' => $request->societe_cnss,
                    'societe_rc' => $request->societe_rc,
                    'societe_pattent' => $request->societe_pattent,
                    'societe_if' => $request->societe_if,
                    'societe_ice' => $request->societe_ice
                ]);

        return redirect('/societe');

    }

    public function deleteOldLogo($path){
        if(file_exists($path)){
            @unlink($path);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
