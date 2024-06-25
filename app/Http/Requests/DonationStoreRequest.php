<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationStoreRequest extends FormRequest
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
            'member_id' => 'min:7',
            'purpose' => 'required|max:255',
            'amount' => 'required|integer',
        ];
    }
}
