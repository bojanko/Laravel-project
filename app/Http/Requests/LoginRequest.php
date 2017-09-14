<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\User;
use Illuminate\Support\Facades\Hash;

class LoginRequest extends FormRequest
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
        $user = User::where('email', '=', $this->input('email'))->get();

        if($user->count() > 0){
            if(Hash::check($this->input('password'), $user[0]->password)){
                return [];
            }
            else{
                return[
                  'password' => 'required|in:'.$this->input('password')."123"
                ];
            }
        }
        else{
            return [
              'email' => 'required|email|exists:users,email',
              'password' => 'required'
            ];
        }

    }
}
