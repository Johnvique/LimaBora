<?php

namespace App\Http\Controllers;
use File;
use App\Farmers;
use Illuminate\Http\Request;

class FarmersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $farmers = Farmers::all();
        return view('Admin/Farmers/view_farmers',compact('farmers'));
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

        if ($request->hasFile('picture')) {
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('picture')->move(public_path('photos'), $fileNameToStore);
        } else {
            $fileNameToStore = 'default.jpg';
        }

        $farmer = new Farmers;
        $farmer->username=$request->get('username');
        $farmer->phone=$request->get('phone');
        $farmer->location=$request->get('location');
        $farmer->ID_No=$request->get('ID_No');
        $farmer->picture=$fileNameToStore;
        $farmer->gender=$request->get('gender');
        $farmer->email=$request->get('email');

        $farmer->save();
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Farmers  $farmers
     * @return \Illuminate\Http\Response
     */
    public function show(Farmers $farmers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Farmers  $farmers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $farmer = Farmers::find($id);
        return view('Admin/Farmers/edit',compact('farmer'));

        return redirect('Farmers/view_farmers');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Farmers  $farmers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        $farmer = Farmers::find($id);

        if ($request->hasFile('picture')) {
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('picture')->move(public_path('photos'), $fileNameToStore);
        } else {
            $fileNameToStore = 'default.jpg';
        }

        $farmer->update([
            'username'=>$request->username,
            'phone'=>$request->phone,
            'location'=>$request->location,
            'ID_No'=>$request->ID_No,
            'picture'=>$fileNameToStore,
            'gender'=>$request->gender,
            'email'=>$request->email,
        ]);

        return redirect('Farmers/view_farmers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Farmers  $farmers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $farmer = Farmers::find($id);
        file::delete('photos/'.$farmer->picture);
        $farmer->delete();

        return redirect('Farmers/view_farmers');
    }
}
