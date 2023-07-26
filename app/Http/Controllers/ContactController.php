<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Contact::all();
        return response ()->json([ 'success'=>true,'data'=>$data, 'message' =>'successfully show']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       

        $data = Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'company' => $request->input('company'),
            'msg' => $request->input('msg'),
         
        ]);
       
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => 'Message is Sent successfully!',
        ]);
     
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data=Contact::find($id);
        return response()->json(['success'=>true,'data'=>$data,'message'=>'fetched successfully!']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Contact::find($id)->delete();
        return response()->json(['success'=>true,'message'=>' deleted successfully!']);
    }
}
