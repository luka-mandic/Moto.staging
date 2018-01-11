<?php

namespace App\Http\Controllers;

use App\Motor;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMotor;

class MotorController extends Controller
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
        $motori = Motor::latest()->paginate(15);
        //dd($motori);
        return view('motori.home', compact('motori'));
    }

    public function search(Request $request)
    {

        $motori = Motor::search($request->input('search'))->get();
        $pretraga = $request->input('search');
        return view('motori.search', compact('motori', 'pretraga'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('motori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMotor $request)
    {

        $motor = Motor::create(request(['broj_sasije', 'naziv']));

        return redirect('/home/'.$motor->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Motor  $motor
     * @return \Illuminate\Http\Response
     */
    public function show(Motor $motor)
    {
  
        $servisi = $motor->servis()->oldest()->get();

        return view('motori.show', compact('servisi', 'motor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Motor  $motor
     * @return \Illuminate\Http\Response
     */
    public function edit(Motor $motor)
    {
        return view('motori.edit', compact('motor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Motor  $motor
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMotor $request, Motor $motor)
    {
        $motor->update(request(['broj_sasije', 'naziv']));

        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Motor  $motor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Motor $motor)
    {
        

        $motor->servis()->delete();

        $motor->delete();

        return back();
    }
}
