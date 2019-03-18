<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saveEvent extends FormRequest
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
            "firstname" => "min:5",
            "surname" => "min:5",
            "phone" => "min:5",
            "email" => "email",
            "date" => "min:5",
            "type" => "required|in:Fotozrcadlo,Printerka,Svatba,Maturitní ples,Rodinné focení",
            "message" => "min:5",
        ];
    }
}
