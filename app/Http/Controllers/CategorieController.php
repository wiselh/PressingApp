<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategorieController extends Controller
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

        $categories = DB::table('categories')->get();
        return view('Pages.Categorie.show', ['categories' => $categories]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pages.Categorie.show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categorie = new Categorie();
        $categorie->categorie_name=$request->categorie_name;
        $categorie->save();
        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $categorie = Categorie::findOrFail($id);
//        return view('Pages.Categorie.edit',compact('categorie'));


        $categorie = DB::table('categories')->where('id_categorie', $id)->first();
        return view('Pages.Categorie.edit', ['categorie' => $categorie]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = DB::table('categories')->where('id_categorie', $id)->first();
        return view('Pages.Categorie.edit', ['categorie' => $categorie]);
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
//        $categorie = Categorie::findOrFail($id);
//        $categorie->update($request->all());

        DB::table('categories')
            ->where('id_categorie', $id)
            ->update(['categorie_name' =>$request->categorie_name]);


        return redirect('/categories');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $categorie = Categorie::findOrFail($id);
//        $categorie = DB::table('categories')->where('id_categorie', $id)->first();
        DB::table('categories')->where('id_categorie', '=', $id)->delete();
        return redirect('/categories');
    }
}
