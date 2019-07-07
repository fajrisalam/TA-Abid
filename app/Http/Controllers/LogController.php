<?php

namespace App\Http\Controllers;

use App\Log;
use App\Karyawan;
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
        $last = Log::where('created_at', '>=', date('Y-m-d').' 00:00:00')
            ->where('id_karyawan', $karyawan)->where('id_arduino', $arduino)->get()->last();
        
        if(!$last) $masuk = 'Masuk';
        else if($last->status == 'Masuk') $masuk = 'Keluar';
        else $masuk = 'Masuk';
        // dd($last->status);
        $data['id_karyawan'] = $karyawan;
        $data['id_arduino'] = $arduino;
        $input = new Log($data);
        $input->status = $masuk;
        $input->save();

        if($masuk = 'Masuk'){            
            $update = Karyawan::where('rfid', $karyawan)
                ->where('id_arduino', '!=', 4)
                ->update(['id_arduino' => $arduino]);
        }
        else{
            $update = Karyawan::where('rfid', $karyawan)
                ->update(['id_arduino' => 0]);
        }

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
