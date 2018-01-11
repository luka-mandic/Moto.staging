<?php

namespace App\Http\Controllers;

use App\Servis;
use App\Motor;
use Illuminate\Http\Request;

class ServisController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Motor $motor)
    {
        return view('servis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'opis' => 'required',
        ]);

        Servis::create([
            'motor_id' => request('motor_id'),
            'opis' => request('opis'),
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servis  $servis
     * @return \Illuminate\Http\Response
     */
    public function show(Servis $servis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servis  $servis
     * @return \Illuminate\Http\Response
     */
    public function edit(Servis $servis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servis  $servis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servis $servis)
    {
        $request->validate([
            'opis' => 'required',
        ]);

        $servis->update([
            'opis' => request('opis'),
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servis  $servis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servis $servis)
    {
        $servis->delete();

        return redirect()->back();
    }
}
