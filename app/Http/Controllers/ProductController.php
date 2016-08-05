<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class ProductController extends Controller
{
    //
    public function index()
    {
    	return redirect()->route('profileku');;
    }

    public function show()
    {
		// $result = DB::select('call getLibraryList(?)',array($email));
		$result1 = DB::select('EXEC sp_coba');
		$result = DB::insert('EXEC sp_insertcoba ?,?,?', array("6","x","1") );
		$status = 'success';
    	return response()->json(['status' =>  $status, 'response' => $result, 'data' => $result1]);
    }
}
