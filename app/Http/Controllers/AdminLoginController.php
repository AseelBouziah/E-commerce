<?php

namespace App\Http\Controllers;

use App\Models\AdminLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        echo view('admin.login');

    }
    public function login(Request $req){
        // validation (form)
        $validated = $req->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);
        $email = $req->input('email');
        $password = $req->input('password');
        $admin_info = AdminLogin::where('email',$email)->first();
        $hashed_pass = $admin_info->password;
        $result = Hash::check($password,$hashed_pass);

        if ( $result ) {
           
            session()->put('admin_id',$admin_info->id);
            // Redirect to success page
            return redirect()->route('category');
        }else{
            return redirect()->route('login')->with('message', 'Unable to login Please check that your email or password is correct!');
        }
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
     * @param  \App\Models\AdminLogin  $adminLogin
     * @return \Illuminate\Http\Response
     */
    public function show(AdminLogin $adminLogin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminLogin  $adminLogin
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminLogin $adminLogin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminLogin  $adminLogin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminLogin $adminLogin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminLogin  $adminLogin
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminLogin $adminLogin)
    {
        //
    }
}
