<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreDataPractice;
use App\Http\Repository\PracticeRepository;
use Illuminate\Support\Facades\Session;
use App\Jobs\StoreDataPracticeJobs;

class PracticeController extends Controller
{
	//create new object from PracticeRepository
	protected $practiceRepo;
	public function __construct(){
		$this->practiceRepo = new PracticeRepository();
	}
	
	
    public function indexPractice(){
//     	dd(env('PUSHER_APP_ID'));
    	return view('practice-index');
	}
	
	//handling http request parameters using form action
// 	public function storeDataPractice(Request $req){
// 		return dd($req->all()); //debugging using dd() function
// // 		return dd($req->input('name'));
// 	}

	//handling http request parameters using form action and request validation
	public function storeDataPractice(StoreDataPractice $req){
		$storeData = $this->practiceRepo->storeDataPractice($req);
		Session::flash('message', $storeData['responseMessage'] );
// 		$req->session()->flash('message', $storeData['responseMessage']);
		if(!$storeData['responseStatus'])
			Session::flash('alert-class', 'alert-danger');
// 			$req->session()->flash('alert-class', 'alert-danger');
		else
			Session::flash('alert-class', 'alert-success');
// 			$req->session()->flash('alert-class', 'alert-success');
		
// 		return dd($req->session()->flash('message', $storeData['responseMessage']));
			
		return back();
	
		//save data using jobs queue
// 		$sendDataPractice = dispatch(new StoreDataPracticeJobs($req->testName, $req->testDescription));
		
	}
}
