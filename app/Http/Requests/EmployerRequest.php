<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EmployerRequest extends Request
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
        $rules = [
           'name'     => 'required',
            'email'    => 'required|email|unique:employers',
            'password' => 'required|min:8',
        ];

        $id = \Request::segment(2);
        
        if (is_numeric($id)) {
            $rules['email']    = 'required|email|unique:employers,email,'.$id;
            $rules['password'] = 'sometimes|min:8';
        }
       
        return $rules;
    }
}
