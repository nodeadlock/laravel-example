<?php

namespace App\Http\Repository;

use App\Models\Book;

class BookRepository{

	public function findById($id){
		return Book::with([])->where('id', $id)->first();
	}
	
}