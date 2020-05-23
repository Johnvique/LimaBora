<?php

namespace App\Http\Controllers;

use App\Plants;
use Illuminate\Http\Request;
use File;

class PlantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $plants = Plants::all();
        return view('Admin/Plants/view_plants',compact('plants'));
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
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->move(public_path('photos'), $fileNameToStore);
        } else {
            $fileNameToStore = 'default.jpg';
        }

        $plant = new Plants;
        $plant->name=$request->get('name');
        $plant->scientific_name=$request->get('scientific_name');
        $plant->classification=$request->get('classification');
        $plant->source=$request->get('source');
        $plant->family=$request->get('family');
        $plant->price=$request->get('price');
        $plant->benefits=$request->get('benefits');
        $plant->image=$fileNameToStore;
        

        $plant->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plants  $plants
     * @return \Illuminate\Http\Response
     */
    public function show(Plants $plants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plants  $plants
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $plant = Plants::find($id);
        return view('Admin/Plants/edit',compact('plant'));

        return redirect('Plants/view_plants');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plants  $plants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->move(public_path('photos'), $fileNameToStore);
        } else {
            $fileNameToStore = 'default.jpg';
        }

        $plant = Plants::find($id);
        $plant->update([
            'name'=>$request->name,
            'scientific_name'=>$request->scientific_name,
            'source'=>$request->source,
            'family'=>$request->family,
            'price'=>$request->price,
            'benefits'=>$request->benefits,
            'image'=>$fileNameToStore,
        ]);

        return redirect('Plants/view_plants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plants  $plants
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $plant = Plants::find($id);
        file::delete('photos/'.$plant->image);
        $plant->delete();

        return redirect('Plants/view_plants');
        
    }
}
