<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Artist::all();
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
        $fileName = time() . '_' . $request->file->getClientOriginalName();
        $request->file->move(public_path('uploads/'), $fileName);

        $data = Artist::create([
            'name' => $request->input('name'),
            'birthday' => $request->input('birthday'),
            'music' => $request->input('music'),
            'chanel' => $request->input('chanel'),
            
            'photo' => $fileName,
           
        ]);
       
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => 'created successfully!',
        ]);
     
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data=Artist::find($id);
        return response()->json(['success'=>true,'data'=>$data,'message'=>'fetched successfully!']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data=Artist::find($id);
        return response()->json(['success'=>true,'data'=>$data,'message'=>'fetched successfully!']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $fileName = time() . '_' . $request->file->getClientOriginalName();
        $request->file->move(public_path('uploads/'), $fileName);

        $data = Artist::findOrFail($id)->update([
            'name' => $request->input('name'),
            'birthday' => $request->input('birthday'),
            'music' => $request->input('music'),
            'chanel' => $request->input('chanel'),
            
            'photo' => $fileName,
           
        ]);
       
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => 'created successfully!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Artist::find($id)->delete();
        return response()->json(['success'=>true,'message'=>' deleted successfully!']);
    }
}
