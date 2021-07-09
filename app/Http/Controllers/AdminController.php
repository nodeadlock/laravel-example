<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreDataBook;
use App\Http\Requests\StoreDataStatus;
use App\Models\Book;
use App\Models\Status;
use App\Services\BookService;
use App\Services\StatusService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
	protected $bookService;
	protected $statusService;

	public function __construct(){
		$this->bookService = new BookService();
		$this->statusService = new StatusService();
	}
    public function indexAdmin(){
    	return view('admin-index');
    }
    
    public function listBook(){
		$book = new Book();
		$book = $book->latest()->get();
		return view('admin-list-book', compact('book'));
    }
    
    public function addBook(){
    	$status = new Status();
    	$status = $status->get();
    	return view('admin-add-book', compact('status'));
    }
    
    public function updateBook(Request $request){
    	$book = $this->bookService->updateBook($request->id);
    	if(!$book['responseStatus']){
    		$request->session()->flash('message', $book['responseMessage']);
    		$request->session()->flash('alert-class', 'alert-danger');
    		return redirect()->back();
    	}
    	$book = $book['responseData'];
    	return view('admin-update-book', compact('book'));
    }
    
    public function saveUpdateBook(Request $request){
    	$book = $this->bookService->saveUpdateBook($request->all(), $request->bookId);
    	if(!$book['responseStatus']){
    		$request->session()->flash('message', $book['responseMessage']);
    		$request->session()->flash('alert-class', 'alert-danger');
    		return redirect()->back();
    		
    	}else{
    		$request->session()->flash('message', $book['responseMessage']);
    		$request->session()->flash('alert-class', 'alert-danger');
    	}
    	
    	return redirect()->route('admin_list_book');
    }
    
    public function saveBook(StoreDataBook $request){
    	$storeData = $this->bookService->storeBook($request);
    	$request->session()->flash('message', $storeData['responseMessage']);
		if(!$storeData['responseStatus'])
			$request->session()->flash('alert-class', 'alert-danger');
		else
			$request->session()->flash('alert-class', 'alert-success');
				
		return back();
    }
    
    public function deleteBook(Request $request){
    	$book = $this->bookService->deleteBook($request->id);
    	if(!$book['responseStatus']){
    		$request->session()->flash('message', $book['responseMessage']);
    		$request->session()->flash('alert-class', 'alert-danger');
    		return redirect()->back();
    		
    	}else{
    		$request->session()->flash('message', $book['responseMessage']);
    		$request->session()->flash('alert-class', 'alert-danger');
    	}
    	
    	return redirect()->route('admin_list_book');
    }
    
    public function listStatus(){
    	$status = new Status();
    	$status = $status->latest()->get();
    	return view('admin-list-status', compact('status'));
    }
	
    public function addStatus(){
    	return view('admin-add-status');
    }
    
    public function saveStatus(StoreDataStatus $request){
    	$storeData = $this->statusService->storeStatus($request);
    	$request->session()->flash('message', $storeData['responseMessage']);
    	if(!$storeData['responseStatus'])
    		$request->session()->flash('alert-class', 'alert-danger');
    	else
			$request->session()->flash('alert-class', 'alert-success');
    			
		return back();
    }
    
    public function updateStatus(Request $request){
    	$status = $this->statusService->updateStatus($request->id);
    	if(!$status['responseStatus']){
    		$request->session()->flash('message', $status['responseMessage']);
    		$request->session()->flash('alert-class', 'alert-danger');
    		return redirect()->back();
    	}
    	$status = $status['responseData'];
    	return view('admin-update-status', compact('status'));
    }
    
    public function saveUpdateStatus(Request $request){
		$status = $this->statusService->saveUpdateStatus($request->all(), $request->statusId);
		if(!$status['responseStatus']){
			$request->session()->flash('message', $status['responseMessage']);
			$request->session()->flash('alert-class', 'alert-danger');
			return redirect()->back();
			
		}else{
			$request->session()->flash('message', $status['responseMessage']);
			$request->session()->flash('alert-class', 'alert-danger');
		}
		
		return redirect()->route('admin_list_status');
    }
    
    public function deleteStatus(Request $request, $id){
    	$status = $this->statusService->deleteStatus($request->id);
    	if(!$status['responseStatus']){
    		$request->session()->flash('message', $status['responseMessage']);
    		$request->session()->flash('alert-class', 'alert-danger');
    		return redirect()->back();
    		
    	}else{
    		$request->session()->flash('message', $status['responseMessage']);
    		$request->session()->flash('alert-class', 'alert-danger');
    	}
    	
    	return redirect()->route('admin_list_status');
    }
}
