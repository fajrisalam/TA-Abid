<?php

namespace App\Http\Controllers;

use App\Karyawan;
use Illuminate\Http\Request;
use App\Log;
use DB;

class KaryawanController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function absen(){
        $data['karyawan'] = Log::whereDate('created_at', DB::raw('CURDATE()'))
            ->where('id_arduino', 1)
            ->where('status', 'Masuk')
            ->orderBy('id_karyawan', 'asc')
            ->orderBy('created_at', 'asc')
            ->get();
        $data['c'] = 1;
        $data['tmp'] = 0;
        // dd($data['karyawan'][0]->karyawan);
        return view('absen', $data);
    }
    public function tambahkaryawan($rfid){
        $exist = Karyawan::where('rfid', $rfid)->get()->first();
        if(!$exist){
            $last = Karyawan::whereNotNull('rfid')->get()->last()->id + 1;
            $update = Karyawan::find($last);
            $update->rfid = $rfid;
            $update->save();
        }
        else echo 'hehe';
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
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        //
    }
}
