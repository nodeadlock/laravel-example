<?php

namespace App\Services;
use App\Http\Repository\StatusRepository;
use App\Models\Status;
use Exception;

class StatusService{
	protected $statusRepo;
	public function __construct(){
		$this->statusRepo= new StatusRepository();
		
	}
	
	public function storeStatus($request = []){
		try {
			$statusRepo = new Status();
			$statusRepo->status = $request['bookStatus'];
			$statusRepo->save();
			$response = ["responseStatus"=>true, "responseMessage"=>"Data berhasil disimpan"];
			return $response;
		} catch (Exception $e) {
			$response = ["responseStatus"=>false, "responseMessage"=>"Maaf, Data tidak berhasil disimpan. Error: ".$e->getMessage()];
			return $response;
		}
		
	}
	
	public function updateStatus($id = null){
		try {
			if($id==null){
				$response = ["responseStatus"=>false, "responseMessage"=>"Data tidak ditemukan"];
				return $response;
				
			}else{
				$data = $this->statusRepo->findById($id);
				if(!$data){
					$response = ["responseStatus"=>false, "responseMessage"=>"Data tidak ditemukan pada id: ".$id];
					return $response;
				}else{
					$response = ["responseStatus"=>true, "responseData"=>$data];
					return $response;
				}
			}
		} catch (Exception $e) {
			$response = ["responseStatus"=>false, "responseMessage"=>"Maaf, Data data tidak ditemukan. Error: ".$e->getMessage()];
			return $response;
		}
		
	}
	
	public function saveUpdateStatus($request, $id=null){
		try {
			if($id==null)
				$response = ["responseStatus"=>false, "responseMessage"=>"Data tidak ditemukan"];
			
			$data = $this->statusRepo->findById($id);
			if(!$data)
				$response = ["responseStatus"=>false, "responseMessage"=>"Data tidak ditemukan pada id: ".$id];
			
			$data->status = $request['bookStatus'];
			$data->save();
			
			$response = ["responseStatus"=>true, "responseMessage"=>"Data '".$data->status."' berhasil diperbaharui"];
			
		} catch (Exception $e) {
			$response = ["responseStatus"=>false, "responseMessage"=>"Maaf, Data tidak berhasil diperbaharui. Error: ".$e->getMessage()];
		}
		return $response;
	}
	
	
	public function deleteStatus($id=null){
		try {
			if($id==null){
				$response = ["responseStatus"=>false, "responseMessage"=>"Data tidak ditemukan"];
				return $response;
				
			}else{
				$data = $this->statusRepo->findById($id);
				if(!$data){
					$response = ["responseStatus"=>false, "responseMessage"=>"Data tidak ditemukan pada id: ".$id];
					return $response;
					
				}else{
					$data->delete();
					$response = ["responseStatus"=>true, "responseMessage"=>"Data berhasil dihapus"];
					return $response;
				}
			}
		} catch (Exception $e) {
			$response = ["responseStatus"=>false, "responseMessage"=>"Maaf, Data tidak berhasil dihapus. Error: ".$e->getMessage()];
			return $response;
		}
		
	}
}