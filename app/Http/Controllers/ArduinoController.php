<?php

namespace App\Http\Controllers;

use App\Arduino;
use Illuminate\Http\Request;
use App\Karyawan;

class ArduinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function plan($id_arduino){
        $data = Karyawan::where('id_arduino', $id_arduino)->get();

        $c    = 1;
        $plan = Arduino::where('id', $id_arduino)->first();

        return view('plan', compact(['c', 'data', 'plan']));
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
     * @param  \App\Arduino  $arduino
     * @return \Illuminate\Http\Response
     */
    public function show(Arduino $arduino)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Arduino  $arduino
     * @return \Illuminate\Http\Response
     */
    public function edit(Arduino $arduino)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Arduino  $arduino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Arduino $arduino)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Arduino  $arduino
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arduino $arduino)
    {
        //
    }
}
