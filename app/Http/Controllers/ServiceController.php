<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
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

        $services = DB::table('services')->get();
        return view('Pages.Service.show', ['services' => $services]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pages.Service.show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categorie = new Service();
        $categorie->service_name=$request->service_name;
        $categorie->save();
        return redirect('/services');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $categorie = Service::findOrFail($id);
//        return view('Pages.Service.edit',compact('categorie'));


        $categorie = DB::table('services')->where('id_service', $id)->first();
        return view('Pages.Service.edit', ['categorie' => $categorie]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = DB::table('services')->where('id_service', $id)->first();
        return view('Pages.Service.edit', ['categorie' => $categorie]);
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
//        $categorie = Service::findOrFail($id);
//        $categorie->update($request->all());

        DB::table('services')
            ->where('id_service', $id)
            ->update(['service_name' =>$request->service_name ]);


        return redirect('/services');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('services')->where('id_service', '=', $id)->delete();
        return redirect('/services');
    }
}
