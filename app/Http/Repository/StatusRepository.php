<?php

namespace App\Http\Repository;

use App\Models\Status;

class StatusRepository{

	public function findById($id){
		return Status::with([])->where('id', $id)->first();
	}
}