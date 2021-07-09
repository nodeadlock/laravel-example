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
		$response = ["responseStatus"=>false, "responseMessage"=>""];
		try {
			$statusRepo = new Status();
			$statusRepo->status = $request['bookStatus'];
			$statusRepo->save();
			$response = ["responseStatus"=>true, "responseMessage"=>"Data berhasil disimpan"];
			
		} catch (Exception $e) {
			$response = ["responseMessage"=>"Maaf, Data tidak berhasil disimpan".$e->getMessage()];
		}
		return $response;
	}
	
	public function updateStatus($id = null){
		$response = ["responseStatus"=>false, "responseMessage"=>"", "responseData"=>""];
		
		try {
			if($id==null)
				$response = ["responseStatus"=>false, "responseMessage"=>"Data tidak ditemukan"];
				
			$data = $this->statusRepo->findById($id);
			$response = ["responseStatus"=>true, "responseData"=>$data];
			
		} catch (Exception $e) {
			$response = ["responseMessage"=>"Maaf, Data data tidak ditemukan. Error: ".$e->getMessage()];
		}
		return $response;
	}
	
	public function saveUpdateStatus($request, $id=null){
		$response = ["responseStatus"=>false, "responseMessage"=>"", "responseData"=>""];
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
			$response = ["responseMessage"=>"Maaf, Data tidak berhasil diperbaharui. Error: ".$e->getMessage()];
		}
		return $response;
	}
	
	
	public function deleteStatus($id=null){
		$response = ["responseStatus"=>false, "responseMessage"=>"", "responseData"=>""];
		try {
			if($id==null)
				$response = ["responseStatus"=>false, "responseMessage"=>"Data tidak ditemukan"];
				
				$data = $this->statusRepo->findById($id);
				if(!$data)
					$response = ["responseStatus"=>false, "responseMessage"=>"Data tidak ditemukan pada id: ".$id];
					
				$data->delete();
					
				$response = ["responseStatus"=>true, "responseMessage"=>"Data berhasil dihapus"];
					
		} catch (Exception $e) {
			$response = ["responseMessage"=>"Maaf, Data tidak berhasil dihapus. Error: ".$e->getMessage()];
		}
		return $response;
	}
}