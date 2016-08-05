<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Validator;

class KaryawanController extends Controller
{
    //
    public function index()
    {
    	return redirect()->route('karyawan');;
    }
	
	function getAllData(Request $request)
	{
		$user = 0;
		$searchStatus = $request->input('searchStatus');
		$searchNamaKaryawan = $request->input('searchNamaKaryawan');
        $page = $request->input('page');
		$user = 0;
        $perpage = 20;
        $start_row = (($page - 1) * $perpage) + 1;
        $res = DB::select('EXEC Usermanagement_Karyawan_GetAllData ?,?,?,?', array($start_row, $perpage, $searchStatus, $searchNamaKaryawan));
        $count = DB::select('EXEC Usermanagement_Karyawan_GetAllDataCount ?,?', array($searchStatus, $searchNamaKaryawan));
        $result = array(            
            'data' => $res,
            'count' => $count,
            'perpage' => $perpage
        );
		$status = 'Success';
		return response()->json(['status' =>  $status, 'response' => $result]);
	}
	
	function getAllDataUpdate($id){
		$res = DB::select('EXEC Usermanagement_Karyawan_GetAllDataUpdate ?', array($id));
		
		$result = array(
			'data' => $res
		);
		
		$status = $res[0]->StatusReport;
		return response()->json(['status' =>  $status, 'response' => $result]);
	}
	
	function getAllDataUpdateHistoriJabatan($id){
		$res = DB::select('EXEC Usermanagement_Karyawan_GetAllDataUpdate ?', array($id));
		
		$result = array(
			'data' => $res
		);
		
		$status = $res[0]->StatusReport;
		return response()->json(['status' =>  $status, 'response' => $result]);
	}
	
	function action(Request $request)
	{
		$idKaryawan = $request->input('idKaryawan');
		$noKaryawan = $request->input('noKaryawan');
		$namaKaryawan = $request->input('namaKaryawan');
		$tanggalLahir = $request->input('tanggalLahir');
		$email = $request->input('email');
		$NIDN = $request->input('NIDN');
		// validation
		$inputs = array(
			'noKaryawan' => $noKaryawan,
			'namaKaryawan' => $namaKaryawan
		);
		$rules = array(
			'noKaryawan' => "required|max:45",
			'namaKaryawan' => "required|max:100"
		);

		$validator = Validator::make($inputs, $rules);
		if ($validator->fails()) {		
			$status = 'ErrorValidation';
			return response()->json(['status' =>  $status, 'response' => $validator->messages()->all()]);
		} else {
			if($idKaryawan === ''){
				// begin transaction , rollback, and commit
				DB::beginTransaction();
				$result = DB::select('EXEC Usermanagement_Karyawan_InsertData ?,?,?,?,?', array($noKaryawan, $namaKaryawan, $tanggalLahir, $email, $NIDN) );
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
				$result = DB::select('EXEC Usermanagement_Menu_UpdateData ?,?,?,?,?', array($idAplikasi, $namaMenu, $linkMenu, $menuUtama, $idMenu) );
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
	
	function deleteData($id){		
		DB::beginTransaction();
		$result = DB::select('EXEC Usermanagement_Menu_DeleteData ?', array($id) );
		if($result[0]->StatusReport != 'Success'){
			DB::rollBack();
		} else {
			DB::commit();
		}
		$status = $result[0]->StatusReport;
		return response()->json(['status' =>  $status, 'response' => $result]);
	}
	
	function moveUp($id){		
		DB::beginTransaction();
		$result = DB::select('EXEC Usermanagement_Menu_MoveUp ?', array($id) );
		if($result[0]->StatusReport != 'Success'){
			DB::rollBack();
		} else {
			DB::commit();
		}
		$status = $result[0]->StatusReport;
		return response()->json(['status' =>  $status, 'response' => $result]);
	}
	
	function moveDown($id){		
		DB::beginTransaction();
		$result = DB::select('EXEC Usermanagement_Menu_MoveDown ?', array($id) );
		if($result[0]->StatusReport != 'Success'){
			DB::rollBack();
		} else {
			DB::commit();
		}
		$status = $result[0]->StatusReport;
		return response()->json(['status' =>  $status, 'response' => $result]);
	}
}
