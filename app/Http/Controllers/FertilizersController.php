<?php

namespace App\Http\Controllers;

use App\Fertilizers;
use Illuminate\Http\Request;
use File;

class FertilizersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fertilizers = Fertilizers::all();
        return view('Admin/Fertilizers/view_fertilizers',compact('fertilizers'));
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

        $fertilizer = new Fertilizers;
        $fertilizer->name=$request->get('name');
        $fertilizer->type=$request->get('type');
        $fertilizer->composition=$request->get('composition');
        $fertilizer->uses=$request->get('uses');
        $fertilizer->benefits=$request->get('benefits');
        $fertilizer->effects=$request->get('effects');
        $fertilizer->cost=$request->get('cost');
        $fertilizer->image=$fileNameToStore;

        $fertilizer->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fertilizers  $fertilizers
     * @return \Illuminate\Http\Response
     */
    public function show(Fertilizers $fertilizers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fertilizers  $fertilizers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $fertilizer = Fertilizers::find($id);
        return view('Admin/Fertilizers/edit',compact('fertilizer'));

        return redirect('Fertilizers/view_fertilizers');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fertilizers  $fertilizers
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

        $fertilizer = Fertilizers::find($id);
        $fertilizer->update([
            'name'=>$request->name,
            'type'=>$request->type,
            'composition'=>$request->composition,
            'uses'=>$request->uses,
            'benefits'=>$request->benefits,
            'effects'=>$request->effects,
            'cost'=>$request->cost,
            'image'=>$fileNameToStore,
        ]);

        return redirect('Fertilizers/view_fertilizers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fertilizers  $fertilizers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $fertilizer = Fertilizers::find($id);
        file::delete('photos/'.$fertilizer->image);
        $fertilizer->delete();

        return redirect('Fertilizers/view_fertilizers');
    }
}
