<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'description' => 'nullable|string',
            'phone' => 'nullable|integer',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'password' => 'required|string',
            'profile_photo_path' => 'nullable|string',
            'salary' => 'nullable|numeric',
            'is_active' => 'nullable|boolean',
            'status' => 'nullable|string',
            'seller_status' => 'nullable|string',
            'dob' => 'nullable|date',
            'meta' => 'nullable|json',
            'user_id' => 'nullable|integer',
        ];
    }

    //message
    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'password.required' => 'Password is required',
            'meta.json' => 'Meta should be a valid json',
        ];
    }
}
