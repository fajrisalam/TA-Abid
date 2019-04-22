<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class LogController extends Controller
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
    public function masuk($karyawan, $arduino){
        $now = Carbon::now()->toDateTimeString();
        // dd($now);
        // $input = Log::create('id_karyawan' => $karyawan);
        // $input = new Log();
        // $input->id_karyawan = $karyawan;
        // $input->id_arduino = $arduino;
        // $input->status = 1;
        // $input->save();

        $data['id_karyawan'] = $karyawan;
        $data['id_arduino'] = $arduino;
        $input = new Log($data);
        $input->status = 1;
        $input->save();
    }

    public function keluar($karyawan, $arduino){
        $now = Carbon::now()->toDateTimeString();
        // dd($now);

        $input = new Log();
        $input->id_karyawan = $karyawan;
        $input->id_arduino = $arduino;
        $input->status = 0;
        $input->save();
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
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function show(Log $log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function edit(Log $log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Log $log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Log $log)
    {
        //
    }
}
