<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImpressionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('Pages.Impression.generate', [
            'id' => $id,
        ]);
    }

}
