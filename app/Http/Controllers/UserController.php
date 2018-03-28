<?php

namespace App\Http\Controllers;

use App\Permission;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Validator;


class UserController extends Controller
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
        $users = DB::table('users')->get();
        return view('Pages.User.show', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }
     public function sweet(){
        return view('Pages.User.sweetalert');
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'username' => "unique:users",
            'email' => 'unique:users',
        ];
        $messages =[
        'username.unique' => 'Cet nom d\'utilisateur est déjà utilisé!',
        'email.unique' => 'Cet adresse email est déjà utilisé!',
        ];
        $this->validate($request,$rules,$messages);
//        return ['response' => 'Store Method'];


        $user = new User;
        $user->fullname=$request->fullname;
        $user->username=$request->username;
        $user->adresse=$request->adresse;
        $user->email=$request->email;
        $user->tele=$request->tele;

        $pic = Input::file('picture');
        if ($pic==null){
            $picture_local='assets/img/avatars/avatar.png';
        }else{
            $picture_name = $request->username.'.'.$request->picture->extension();
            $picture_local='assets/img/avatars/'.$picture_name;
            $pic->move('assets/img/avatars', $picture_name);
        }

        $user->picture=$picture_local;
        $user->password=bcrypt($request->user_password);
        $user->permission='oui';
        $user->save();

        //permissions
        $permissions = Input::get('permission');
        $arr = [];
        foreach ($permissions as $per)
        {
            array_push($arr,$per);
        }
        $user->syncPermissions($arr);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $user = DB::table('users')->where('id', $id)->first();

        $rules = [
            'username' => "unique:users,username,".$id,
            'email' => 'unique:users,email,'.$id,
        ];
        $messages =[
            'username.unique' => 'Cet nom d\'utilisateur est déjà utilisé!',
            'email.unique' => 'Cet adresse email est déjà utilisé!',
        ];
        $this->validate($request,$rules,$messages);

        return response()->json(['response' => 'Gooood + '.$id]);



//        $rules = [
//            'username' => "unique:users,username,".$id,
//            'email' => 'unique:users,email,'.$id,
//        ];
//        $messages =[
//            'username.unique' => 'Cet nom d\'utilisateur est déjà utilisé!',
//            'email.unique' => 'Cet adresse email est déjà utilisé!',
//        ];
//        $this->validate($request,$rules,$messages);

//        DB::table('users')
//            ->where('id', $id)
//            ->update(['' =>$request->fullname ]);
//
//
//        return redirect('/services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id', '=', $id)->delete();
        return redirect('/users');
    }




}
