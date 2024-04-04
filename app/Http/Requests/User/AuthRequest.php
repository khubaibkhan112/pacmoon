<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'twitter_id'=>"required",
            "username"=>"required|string",
            "email"=>"required_if:phone,null",
            "phone"=>"required_if:email,null",
            "twitter_token"=>"required",
            // "profile_img"=>"required"

        ];
    }
}
