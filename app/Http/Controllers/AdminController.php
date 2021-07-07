<?php

namespace App\Http\Controllers;

use App\Http\Repository\BookRepository;
use App\Http\Requests\StoreDataBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
	protected $bookRepo;
	public function __construct(){
		$this->bookRepo = new BookRepository();
	}
    public function indexAdmin(){
    	return view('admin-index');
    }
    
    public function listBook(){
    	$getBook = $this->bookRepo->getDataRepository();
    	return view('admin-list-book')->with('getBookData', $getBook);
    }
    
    public function addBook(){
    	return view('admin-add-book');
    }
    
    public function updateBook($id){
//     	dd($this->getBookById($id));
    	$getBookById = $this->bookRepo->getByIdDataRepository($id);
    	return view('admin-update-book')->with('getBookDataById', $getBookById);
    }
    
    public function saveUpdateBook(StoreDataBook $request){
    	$updateData = $this->bookRepo->saveUpdateDataRepository($request);
    	$request->session()->flash('message', $updateData['responseMessage']);
    	if(!$updateData['responseStatus'])
    		$request->session()->flash('alert-class', 'alert-danger');
    	else
			$request->session()->flash('alert-class', 'alert-success');
    	return redirect()->route('admin_list_book');
    }
    
    public function saveBook(StoreDataBook $request){
//     	return dd($request->all());
    	$storeData = $this->bookRepo->storeDataRepository($request);
// 		Session::flash('message', $storeData['responseMessage'] );
    	$request->session()->flash('message', $storeData['responseMessage']);
		if(!$storeData['responseStatus'])
// 			Session::flash('alert-class', 'alert-danger');
			$request->session()->flash('alert-class', 'alert-danger');
		else
// 			Session::flash('alert-class', 'alert-success');
			$request->session()->flash('alert-class', 'alert-success');
				
		return back();
    }
    
    public function saveDeleteBook(Request $request, $id){
    	$deleted = $this->bookRepo->deleteDataRepository($id);
    	$request->session()->flash('message', $deleted['responseMessage']);
    	if(!$deleted['responseStatus'])
    		$request->session()->flash('alert-class', 'alert-danger');
    	else
    		$request->session()->flash('alert-class', 'alert-success');
    	
    	return redirect()->route('admin_list_book');
    }
    
	
}
