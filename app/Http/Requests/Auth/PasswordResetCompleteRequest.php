<?php namespace TagProNews\Http\Requests\Auth;

use TagProNews\Http\Requests\Request;

class PasswordResetCompleteRequest extends Request
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
            'email' => 'required|email|exists:password_resets,email',
            'token' => 'required|exists:password_resets,token',
            'password' => 'required|confirmed'
        ];
    }

}
