<?php

namespace App\Http\Repository;

use App\Models\Status;

class StatusRepository{
	public function storeDataRepository($request = []){
		$response = ["responseStatus"=>false, "responseMessage"=>""];
		try {
			$statusRepo = new Status();
			$statusRepo->status = $request['bookStatus'];
			$statusRepo->save();
			$response = ["responseStatus"=>true, "responseMessage"=>"Data status buku berhasil disimpan"];
			
		} catch (Exception $e) {
			$response = ["responseMessage"=>"Maaf, Data status buku tidak berhasil disimpan"];
		}
		return $response;
	}
	
	public function getDataRepository(){
		$getStatus = new Status();
		$getStatus = Status::all();
		return $getStatus;
	}
	
	public function getByIdDataRepository($id){
		$getBookStatus = new Status();
		$getBookStatus = Status::find($id);
		return $getBookStatus;
	}
	
	public function saveUpdateDataRepository($request = []){
		$response = ["responseStatus"=>false, "responseMessage"=>""];
		try {
			$statusRepo = new Status();
			$statusRepo->where('id',$request['bookStatusId'])->update(
					[
						'status'=>$request['bookStatus']
					]
						
					);
			
			$response = ["responseStatus"=>true, "responseMessage"=>"Data status buku berhasil diperbaharui"];
			
		} catch (Exception $e) {
			$response = ["responseMessage"=>"Maaf, Data status buku tidak berhasil diperbaharui"];
		}
		return $response;
	}
	
	public function deleteDataRepository($id){
		$response = ["responseStatus"=>false, "responseMessage"=>""];
		try {
			$statusRepo = new Status();
			$statusRepo->where('id',$id)->delete();
			
			$response = ["responseStatus"=>true, "responseMessage"=>"Data status buku berhasil dihapus"];
			
		} catch (Exception $e) {
			$response = ["responseMessage"=>"Maaf, Data status buku tidak berhasil dihapus"];
		}
		return $response;
	}
	
}