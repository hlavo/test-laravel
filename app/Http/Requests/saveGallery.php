<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saveGallery extends FormRequest
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
        $rules =  [
            "password" => "min:5",
            "title" => "min:5"
        ];

        $count = count($this->input('img')) - 1;
        foreach(range(0,$count) as $index){
            $rules["img.$index"] = "mimes:jpeg,bmp,png";
        }

        return $rules;

    }
}
