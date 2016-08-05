<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Validator;

class AplikasiController extends Controller
{
    //
    public function index()
    {
    	return redirect()->route('aplikasi');;
    }
	
	public function getAllData($page)
	{
		$user = 0;
        $perpage = 10;
        $start_row = (($page - 1) * $perpage) + 1;
        $res = DB::select('EXEC Usermanagement_Aplikasi_GetAllData ?,?', array($start_row, $perpage));
        $count = DB::select('EXEC Usermanagement_Aplikasi_GetAllDataCount');
        $result = array(            
            'data' => $res,
            'count' => $count,
            'perpage' => $perpage
        );
		$status = 'Success';
		return response()->json(['status' =>  $status, 'response' => $result]);
	}
	
	public function getAllDataUpdate($id){
		$result = DB::select('EXEC Usermanagement_Aplikasi_GetAllDataUpdate ?', array($id));
		$status = $result[0]->StatusReport;
		return response()->json(['status' =>  $status, 'response' => $result]);
	}
	
	public function action(Request $request)
	{
		$idAplikasi = $request->input('idAplikasi');
		$namaAplikasi = $request->input('namaAplikasi');
		$linkAplikasi = $request->input('linkAplikasi');
		// validation
		$inputs = array(
			'namaAplikasi' => $namaAplikasi,
			'linkAplikasi' => $linkAplikasi
		);
		$rules = array(
			'namaAplikasi' => "required|max:100",
			'linkAplikasi' => "required|max:100"
		);

		$validator = Validator::make($inputs, $rules);
		if ($validator->fails()) {		
			$status = 'ErrorValidation';
			return response()->json(['status' =>  $status, 'response' => $validator->messages()->all()]);
		} else {
			if($idAplikasi === ''){
				// begin transaction , rollback, and commit
				DB::beginTransaction();
				$result = DB::select('EXEC Usermanagement_Aplikasi_InsertData ?,?', array($namaAplikasi, $linkAplikasi) );
				if($result[0]->StatusReport != 'Success'){
					DB::rollBack();
				} else {
					DB::commit();
				}
				
				$status = $result[0]->StatusReport;
				return response()->json(['status' =>  $status, 'response' => $result]);
			} else {
				// begin transaction , rollback, and commit
				DB::beginTransaction();
				$result = DB::select('EXEC Usermanagement_Aplikasi_UpdateData ?,?,?', array($namaAplikasi, $linkAplikasi, $idAplikasi) );
				if($result[0]->StatusReport != 'Success'){
					DB::rollBack();
				} else {
					DB::commit();
				}
				
				$status = $result[0]->StatusReport;
				return response()->json(['status' =>  $status, 'response' => $result]);
			}			
		}
	}
}
