<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::get();
        //dd($users);
        return view('users.admin.index',["users"=>$users]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('users.admin.create');
        //dd('in create method');
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
        //dd($request->username);
        
        $check = $request->validate([
            'username'=>'required|alpha_spaces',
            'email'=>'required|email:rfc,dns',
            'password'=> 'required|min:8'
        ]);
       

         
        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        //dd($user);
        return redirect('/users')->with('message','User Created successfully');
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
        $user = User::find($id); 
        return view('users.admin.edit',['user'=>$user]);
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
        //
        $check = $request->validate([
            'username'=>'required|alpha_spaces',
            'email'=>'required|email:rfc,dns',
           
        ]);

        $user = User::find($id);
        $user->name =  $request->username;
        $user->email = $request->email;
        // $user->password = $request->password;
        $user->save();

        return  redirect('/users')->with('message','user updated successfully');


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
        //dd('deleted');
        $user= User::find($id);
        $user->delete();

        return redirect('/users')->with('message','User deleted successfully');



        

    }
}
