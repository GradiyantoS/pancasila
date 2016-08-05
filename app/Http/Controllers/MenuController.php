<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Validator;

class MenuController extends Controller
{
    //
    public function index()
    {
    	return redirect()->route('menu');;
    }
	
	function getAllData($idAplikasi)
	{
		$user = 0;
        $res = DB::select('EXEC Usermanagement_Menu_GetAllData ?', array($idAplikasi));
        $result = array(            
            'data' => $res
        );
		$status = 'Success';
		return response()->json(['status' =>  $status, 'response' => $result]);
	}
	
	function getAllDataUpdate($id){
		$res = DB::select('EXEC Usermanagement_Menu_GetAllDataUpdate ?', array($id));
		$aplikasi = DB::select('EXEC Usermanagement_Filter_GetAllDataAplikasi');
        $menu = DB::select('EXEC Usermanagement_Filter_GetAllDataMenu ?', array($res[0]->idaplikasi));
		
		$result = array(
			'data' => $res,
			'aplikasi' => $aplikasi,
			'menu' => $menu
		);
		
		$status = $res[0]->StatusReport;
		return response()->json(['status' =>  $status, 'response' => $result]);
	}
	
	function action(Request $request)
	{
		$idMenu = $request->input('idMenu');
		$idAplikasi = $request->input('idAplikasi');
		$namaMenu = $request->input('namaMenu');
		$linkMenu = $request->input('linkMenu');
		$menuUtama = $request->input('menuUtama');
		// validation
		$inputs = array(
			'idAplikasi' => $idAplikasi,
			'namaMenu' => $namaMenu,
			'linkMenu' => $linkMenu
		);
		$rules = array(
			'idAplikasi' => "required|numeric",
			'namaMenu' => "required|max:100",
			'linkMenu' => "required|max:100"
		);

		$validator = Validator::make($inputs, $rules);
		if ($validator->fails()) {		
			$status = 'ErrorValidation';
			return response()->json(['status' =>  $status, 'response' => $validator->messages()->all()]);
		} else {
			if($idMenu === ''){
				// begin transaction , rollback, and commit
				DB::beginTransaction();
				$result = DB::select('EXEC Usermanagement_Menu_InsertData ?,?,?,?', array($idAplikasi, $namaMenu, $linkMenu, $menuUtama) );
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
