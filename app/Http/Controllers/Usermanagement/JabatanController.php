<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Validator;

class JabatanController extends Controller
{
    //
    public function index()
    {
    	return redirect()->route('jabatan');;
    }
	
	function getAllData(Request $request)
	{
		$searchLevelJabatan = $request->input('searchLevelJabatan');
		$searchNamajabatan = $request->input('searchNamajabatan');
		$page = $request->input('page');
		$user = 0;
        $perpage = 15;
        $start_row = (($page - 1) * $perpage) + 1;
        $res = DB::select('EXEC Usermanagement_Jabatan_GetAllData ?,?,?,?', array($start_row, $perpage, $searchLevelJabatan, $searchNamajabatan));
        $count = DB::select('EXEC Usermanagement_Jabatan_GetAllDataCount ?,?', array($searchLevelJabatan, $searchNamajabatan));
        $result = array(            
            'data' => $res,
            'count' => $count,
            'perpage' => $perpage
        );
		$status = 'Success';
		return response()->json(['status' =>  $status, 'response' => $result]);
	}
	
	function getAllDataUpdate($id){
		$res = DB::select('EXEC Usermanagement_Jabatan_GetAllDataUpdate ?', array($id));
		$leveljabatan = DB::select('EXEC Usermanagement_Filter_GetAllDataLevelJabatan');
		if(COUNT($res) > 0){
			$jabatan = DB::select('EXEC Usermanagement_Filter_GetAllDataJabatan ?', array($res[0]->idleveljabatanatasan));
		} else {
			$jabatan = DB::select('EXEC Usermanagement_Filter_GetAllDataJabatan ?', array(''));
		}
		
		
		$result = array(
			'data' => $res,
			'leveljabatan' => $leveljabatan,
			'jabatan' => $jabatan,
		);
		
		$status = $res[0]->StatusReport;
		return response()->json(['status' =>  $status, 'response' => $result]);
	}
	
	function getAllDataUpdateHakAkses($id){
		$res = DB::select('EXEC Usermanagement_Jabatan_GetAllDataUpdateHakAkses ?', array($id));
		if($res[0]->idaplikasi == null){
			$detail = [];
		} else {
			$detail = DB::select('EXEC Usermanagement_Jabatan_GetAllDataUpdateHakAksesDetail ?,?', array($id, $res[0]->idaplikasi));
		}
		$aplikasi = DB::select('EXEC Usermanagement_Filter_GetAllDataAplikasi');		
		
		$result = array(
			'data' => $res,
			'detail' => $detail,
			'aplikasi' => $aplikasi
		);
		
		$status = $res[0]->StatusReport;
		return response()->json(['status' =>  $status, 'response' => $result]);
	}
	
	function getMenuChild($id){
		$result = DB::select('EXEC Usermanagement_Jabatan_CheckMenuChild ?', array($id));
		$status = $result[0]->StatusReport;
		return response()->json(['status' =>  $status, 'response' => $result]);		
	}
	
	function action(Request $request)
	{
		$idJabatan = $request->input('idJabatan');
		$namaJabatanIndo = $request->input('namaJabatanIndo');
		$namaJabatanIng = $request->input('namaJabatanIng');
		$levelJabatan = $request->input('levelJabatan');
		$levelJabatanAtasan = $request->input('levelJabatanAtasan');
		$jabatan = $request->input('jabatan');
		// validation
		$inputs = array(
			'namaJabatanIndo' => $namaJabatanIndo,
			'namaJabatanIng' => $namaJabatanIng,
			'levelJabatan' => $levelJabatan
		);
		$rules = array(
			'namaJabatanIndo' => "required|max:100",
			'namaJabatanIng' => "required|max:100",
			'levelJabatan' => "required|numeric"
		);

		$validator = Validator::make($inputs, $rules);
		if ($validator->fails()) {		
			$status = 'ErrorValidation';
			return response()->json(['status' =>  $status, 'response' => $validator->messages()->all()]);
		} else {
			if($idJabatan === ''){
				// begin transaction , rollback, and commit
				DB::beginTransaction();
				$result = DB::select('EXEC Usermanagement_Jabatan_InsertData ?,?,?,?', array($namaJabatanIndo, $namaJabatanIng, $levelJabatan, $jabatan) );
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
				$result = DB::select('EXEC Usermanagement_Jabatan_UpdateData ?,?,?,?,?', array($namaJabatanIndo, $namaJabatanIng, $levelJabatan, $jabatan, $idJabatan) );
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
	
	function actionHakAkses(Request $request)
	{
		$idJabatanForHakAkses = $request->input('idJabatanHakAkses');
		$namaAplikasi = $request->input('namaAplikasi');
		foreach($request->input('menu') as $key => $val)
		{
			$menu[] = $val;
		}
		// validation
		$inputs = array(
			'idJabatan' => $idJabatanForHakAkses,
			'namaAplikasi' => $namaAplikasi
		);
		$rules = array(
			'idJabatan' => "required|numeric",
			'namaAplikasi' => "required|numeric"
		);

		$validator = Validator::make($inputs, $rules);
		if ($validator->fails()) {		
			$status = 'ErrorValidation';
			return response()->json(['status' =>  $status, 'response' => $validator->messages()->all()]);
		} else {			
			// begin transaction , rollback, and commit
			$resultStatus = array();
			$resultResponse = array();
			DB::beginTransaction();
			$resultDelete = DB::select('EXEC Usermanagement_Jabatan_DeleteDataHakAkses ?,?', array($idJabatanForHakAkses, $namaAplikasi) );
			if($resultDelete[0]->StatusReport != 'Success'){
				DB::rollBack();
			} else {
				DB::commit();
			}
			
			if(COUNT($menu) > 0){
				for($x = 0; $x < COUNT($menu); $x++){
					DB::beginTransaction();
					$result = DB::select('EXEC Usermanagement_Jabatan_InsertDataHakAkses ?,?,?', array($idJabatanForHakAkses, $namaAplikasi, $menu[$x]) );
					// if($result[0]->StatusReport == 'Success'){
						// $resultStatus[] = $result[0]->StatusReport;
						// $resultResponse[0]['DescriptionReport'] = $result[0]->DescriptionReport;
					// }
					if($result[0]->StatusReport != 'Success'){
						DB::rollBack();
						$status = "Error";
					} else {
						DB::commit();
						$status = "Success";
					}
				}
				
				// if(COUNT($resultStatus) != COUNT($menu)){
					// DB::rollBack();
					// $status = "Error";
				// }
				// else {
					// $status = "Success";
					// DB::commit();
				// }
				
				$resultResponse[0]['DescriptionReport'] = "Hak Akses Aplikasi Success";
				return response()->json(['status' =>  $status, 'response' => $resultResponse]);	
			} else {
				$status = "Success";
				$resultResponse[0]['DescriptionReport'] = "Hak Akses Aplikasi Success";
				return response()->json(['status' =>  $status, 'response' => $resultResponse]);
			}
		}
	}
}
