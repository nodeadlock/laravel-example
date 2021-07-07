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
			$response = ["responseStatus"=>true, "responseMessage"=>"Data berhasil disimpan"];
			
		} catch (Exception $e) {
			$response = ["responseMessage"=>"Maaf, Data tidak berhasil disimpan"];
		}
		return $response;
	}
	
	public function getDataRepository(){
		$getStatus = new Status();
		$getStatus = Status::all();
		return $getStatus;
	}
	
	public function getByIdDataRepository($id){
		$getBookById = new Book();
		$getBookById = Book::find($id);
		return $getBookById;
	}
	
	public function saveUpdateDataRepository($request = []){
		$response = ["responseStatus"=>false, "responseMessage"=>""];
		try {
			$bookRepo = new Book();
// 			$bookRepo->title = $request['bookTitle'];
// 			$bookRepo->description = $request['bookDescription'];
// 			$bookRepo->stock = $request['bookStock'];
// 			$bookRepo->category = $request['bookCategory'];
// 			$bookRepo->author = $request['bookAuthor'];
// 			$bookRepo->status = $request['bookStatus'];
// 			dd($request['bookStatus']);
			
			$bookRepo->where('id',$request['bookId'])->update(
					[
						'title'=>$request['bookTitle'],
						'description'=>$request['bookDescription'],
						'stock'=>$request['bookStock'],
						'category'=>$request['bookCategory'],
						'author'=>$request['bookAuthor'],
						'status'=>$request['bookStatus']
					]
						
					);
			
			$response = ["responseStatus"=>true, "responseMessage"=>"Data berhasil diperbaharui"];
			
		} catch (Exception $e) {
			$response = ["responseMessage"=>"Maaf, Data tidak berhasil diperbaharui"];
		}
		return $response;
	}
	
	public function deleteDataRepository($id){
		$response = ["responseStatus"=>false, "responseMessage"=>""];
		try {
			$bookRepo = new Book();
			$bookRepo->where('id',$id)->delete();
			
			$response = ["responseStatus"=>true, "responseMessage"=>"Data berhasil dihapus"];
			
		} catch (Exception $e) {
			$response = ["responseMessage"=>"Maaf, Data tidak berhasil dihapus"];
		}
		return $response;
	}
	
}