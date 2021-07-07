<?php 

namespace App\Http\Repository;

use App\Models\Practice;

class PracticeRepository{
	
	public function storeDataPractice($request = [] ){
// 		return dd($request->all());

		$response = ["responseStatus"=>false, "responseMessage"=>""];	
		try {
// 			dd($request->all());
			$practiceRepo = new Practice();
			$practiceRepo->name = $request['testName'];
			$practiceRepo->description = $request['testDescription'];
// 			$name = $request['testName'];
// 			$description = $request['testDescription'];
// 			return dd($description);
			$practiceRepo->save();
			
			//set response
			$response ["responseStatus"] = true;
// 			$response ["responseMessage"] = $practiceRepo; //debugging mode
			$response ["responseMessage"] = "Data berhasil disimpan";
			
		} catch (Exception $e) {
// 			$response ["responseMessage"] = $e->getMessage(); //debugging mode
			$response ["responseMessage"] = "Maaf, data tidak berhasil disimpan";
		}
		return $response;
	}
}

?>