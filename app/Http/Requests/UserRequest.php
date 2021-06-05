<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if($this->isMethod('post')) {
            return [
                'username' => 'required',
                'email' => ['required', 'email','unique:users'],
                'userRole' => 'required',
                'userPassword' => 'required|min:8|max:20'
            ];
        }elseif($this->isMethod('put') || $this->isMethod('patch')){
            return [
                'username' => 'required',
                'email' => 'required|email',
                'userRole' => 'required',
                'userPassword' => 'min:8|max:20'
            ];
        }
    }
}
