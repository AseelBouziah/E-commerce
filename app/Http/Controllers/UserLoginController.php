<?php

namespace App\Http\Controllers;

use App\Models\UserLogin;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        echo view('pages.login');
    }

    public function login(Request $req){
        // validation (form)
        $validated = $req->validate([
            'userName' => ['required'],
            'password' => ['required']
        ]);
        $name = $req->input('userName');
        $password = $req->input('password');
        $info = UserLogin::where('name',$name)->first();
        $hashed_pass = $info->password;
        $result = Hash::check($password,$hashed_pass);

        if ( $result ) {

            return redirect()->route('home');
        }else{
            return redirect()->route('login')->with('message', 'Unable to login Please check that your email or password is correct!');
        }
    }
    public function register(Request $req){
        $validated = $req->validate([
            'name' => ['required',Rule::unique('logins')],
            'email' => ['required','email',Rule::unique('logins')],
            'password' => ['required']
        ]);
        $new_user= new UserLogin;
        $new_user->name= $req->name;
        $new_user->email= $req->email;
        $new_user->password= Hash::make($req->password);
        


        if ($new_user->save()) {
            return redirect()->route('view_login')->with(['success' => 'user added successfully.']);
        }

        return redirect()->back()->with(['fail' => 'Unable to add new user.']);
        


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
     * @param  \App\Models\UserLogin  $userLogin
     * @return \Illuminate\Http\Response
     */
    public function show(UserLogin $userLogin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserLogin  $userLogin
     * @return \Illuminate\Http\Response
     */
    public function edit(UserLogin $userLogin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserLogin  $userLogin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserLogin $userLogin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserLogin  $userLogin
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserLogin $userLogin)
    {
        //
    }
}
