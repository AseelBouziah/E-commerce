<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contacts = Contact::all();
        return view('admin.contact')->with(compact(['contacts']));
    }

    public function details($id)
    {
        $contact = Contact::where('id', $id)->first();
        return view('admin.details')->with(compact(['contact']));

    }

    public function orders(){
        $orders = Order::all();
        return view('admin.orders')->with(compact(['orders']));
    }
    public function view($id){
        $order = Order::find($id);
        return view('admin.view')->with(compact(['order']));
    }
    public function delete(Request $reques,$id)
    {
        //
        $order = Order::find($id); 
        $order->delete();
        return redirect()->route('orders')->with(['success' => 'Order successfully destroy.']);

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
     * @param  \App\Models\AdminContact  $adminContact
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminContact  $adminContact
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminContact  $adminContact
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminContact  $adminContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $adminContact)
    {
        //
    }
}
