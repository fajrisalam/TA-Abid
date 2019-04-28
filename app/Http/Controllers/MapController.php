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
    	$data = Karyawan::all();
    	// dd($data[0]->arduino);
 		return view('vendor.voyager.map/index', compact('data'));
    }
}
