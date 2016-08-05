<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Validator;

class FilterController extends Controller
{
	public function getAllDataAplikasi()
	{
        $result = DB::select('EXEC Usermanagement_Filter_GetAllDataAplikasi');
        
		$status = 'Success';
		return response()->json(['status' =>  $status, 'response' => $result]);
	}
	
	public function filterInputMenu($idaAplikasi)
	{
        $aplikasi = DB::select('EXEC Usermanagement_Filter_GetAllDataAplikasi');
        $menu = DB::select('EXEC Usermanagement_Filter_GetAllDataMenu ?', array($idaAplikasi));
		
		$result = array(            
            'aplikasi' => $aplikasi,
            'menu' => $menu
        );
        
		$status = 'Success';
		return response()->json(['status' =>  $status, 'response' => $result]);
	}
	
	public function getAllDataLevelJabatan()
	{
        $result = DB::select('EXEC Usermanagement_Filter_GetAllDataLevelJabatan');
        
		$status = 'Success';
		return response()->json(['status' =>  $status, 'response' => $result]);
	}
	
	public function getAllDataJabatan($idLevelJabatan)
	{
        $result = DB::select('EXEC Usermanagement_Filter_GetAllDataJabatan ?', array($idLevelJabatan));
        
		$status = 'Success';
		return response()->json(['status' =>  $status, 'response' => $result]);
	}
}
