<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'phone' => 'required|max:17',
            'home_phone' => 'max:17',
            'office_phone' => 'max:17',
            'address' => 'required|max:255',
            'other_address' => 'max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'zip_code' => 'required|min:5',
            'country' => 'required',
            'medical' => 'required',
            'graduation_year' => 'required|max:4',
            'member_fee' => 'required',
            'password' => 'required|min:6',
        ];
    }
}
