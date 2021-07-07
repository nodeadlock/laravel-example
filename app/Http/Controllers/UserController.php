<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller{
	
	public function saveUserData(Request $req){
		$name = $req->input('name');
		$description = $req->input('description');
		
	}
}
?>