<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Karyawan;
use App\Arduino;

class MapController extends Controller
{
    //
    public function index(){
    	$data['ar1'] = Karyawan::where('id_arduino', 1)->count();
    	$data['ar2'] = Karyawan::where('id_arduino', 2)->count();
    	$data['ar3'] = Karyawan::where('id_arduino', 3)->count();
    	$data['p'] = Arduino::all();
    	// dd($data[0]->arduino);
 		return view('vendor.voyager.map/index', $data);
    }
}
