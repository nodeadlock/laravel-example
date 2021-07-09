<?php

namespace App\Services;
use App\Http\Repository\BookRepository;
use App\Models\Book;
use Exception;
class BookService{
	protected $bookRepo;
	public function __construct(){
		$this->bookRepo = new BookRepository();
		
	}
	
	public function storeBook($request = []){
		$response = ["responseStatus"=>false, "responseMessage"=>""];
		try {
			$bookRepo = new Book();
			$bookRepo->title = $request['bookTitle'];
			$bookRepo->description = $request['bookDescription'];
			$bookRepo->stock = $request['bookStock'];
			$bookRepo->category = $request['bookCategory'];
			$bookRepo->author = $request['bookAuthor'];
			$bookRepo->status = $request['bookStatus'];
			$bookRepo->save();
			$response = ["responseStatus"=>true, "responseMessage"=>"Data berhasil disimpan"];
			
		} catch (Exception $e) {
			$response = ["responseMessage"=>"Maaf, Data tidak berhasil disimpan".$e->getMessage()];
		}
		return $response;
	}
	
	public function updateBook($id = null){
		$response = ["responseStatus"=>false, "responseMessage"=>"", "responseData"=>""];
		
		try {
			if($id==null)
				$response = ["responseStatus"=>false, "responseMessage"=>"Data tidak ditemukan"];
				
			$data = $this->bookRepo->findById($id);
			$response = ["responseStatus"=>true, "responseData"=>$data];
			
		} catch (Exception $e) {
			$response = ["responseMessage"=>"Maaf, Data data tidak ditemukan. Error: ".$e->getMessage()];
		}
		return $response;
	}
	
	public function saveUpdateBook($request, $id=null){
		$response = ["responseStatus"=>false, "responseMessage"=>"", "responseData"=>""];
		try {
			if($id==null)
				$response = ["responseStatus"=>false, "responseMessage"=>"Data tidak ditemukan"];
			
			$data = $this->bookRepo->findById($id);
			if(!$data)
				$response = ["responseStatus"=>false, "responseMessage"=>"Data tidak ditemukan pada id: ".$id];
			
			$data->title = $request['bookTitle'];
			$data->description = $request['bookDescription'];
			$data->stock = $request['bookStock'];
			$data->category = $request['bookCategory'];
			$data->author = $request['bookAuthor'];
			$data->status = $request['bookStatus'];
			$data->save();
			
			$response = ["responseStatus"=>true, "responseMessage"=>"Data '".$data->title."' berhasil diperbaharui"];
			
		} catch (Exception $e) {
			$response = ["responseMessage"=>"Maaf, Data tidak berhasil diperbaharui. Error: ".$e->getMessage()];
		}
		return $response;
	}
	
	public function deleteBook($id=null){
		$response = ["responseStatus"=>false, "responseMessage"=>"", "responseData"=>""];
		try {
			if($id==null)
				$response = ["responseStatus"=>false, "responseMessage"=>"Data tidak ditemukan"];
				
				$data = $this->bookRepo->findById($id);
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