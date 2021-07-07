<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
//     use HasFactory;
	protected $table = 'books';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
// 	protected $fillable = [
// 			'title',
// 			'description',
// 			'stock',
// 			'category',
// 			'author',
// 			'status'
// 	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array
	 */
	protected $casts = [
			'created_at' => 'datetime:Y-m-d H:i:s',
	];
	
}
