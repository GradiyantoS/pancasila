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
	
	function getAllData($menu)
	{
		$user = 0;
        $res = DB::select('EXEC Usermanagement_Widget_GetAllData ?', array($menu));
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
		$idWidget = $request->input('idWidget');
		$idMenu = $request->input('idMenu');
		$namaWidget = $request->input('namaWidget');
		$parameter = $request->input('parameter');
		$namaParameter = $request->input('NamaParameter');
		$active = $request->input('active');
		// validation
		$inputs = array(
			'idMenu' => $idMenu,
			'namaWidget' => $namaWidget
		);
		$rules = array(
			'idMenu' => "required|numeric",
			'namaWidget' => "required|max:255"
		);

		$validator = Validator::make($inputs, $rules);
		if ($validator->fails()) {		
			$status = 'ErrorValidation';
			return response()->json(['status' =>  $status, 'response' => $validator->messages()->all()]);
		} else {
			if($idMenu === ''){
				// begin transaction , rollback, and commit
				DB::beginTransaction();
				$result = DB::select('EXEC Usermanagement_Widget_InsertData ?,?,?,?,?', array($idMenu, $namaMenu, $parameter, $namaParameter, $active) );
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
