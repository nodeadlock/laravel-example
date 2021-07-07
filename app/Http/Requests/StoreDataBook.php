<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDataBook extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "bookTitle"=>"string|required",
        	"bookDescription"=>"string|required",
        	"bookStock"=>"int|required",
        	"bookCategory"=>"string|required",
        	"bookAuthor"=>"string|required",
        	"bookStatus"=>"string|required"
        ];
    }
}
