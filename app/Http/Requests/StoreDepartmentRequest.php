<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return true; // all users create departments
        // return auth()->check(); // only authenticated users can create departments
        return auth()->user()?->role === 'admin'; // login role == admin 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // validation rules for the department creation
             'name' => 'required|string|max:255|unique:departments,name',
            'description' => ['nullable', 'max:1000', 'min:10'],
        ];
    }

     public function messages(): array
    {

        return ['name.required' => 'The department name is required.',
            'name.string' => 'The department name must be a string.',
            'name.max' => 'The department name may not be greater than 255 characters.',
            'name.unique' => 'The department name has already been taken.',
            'description.max' => 'The description may not be greater than 1000 characters.',
            'description.min' => 'The description must be at least 10 characters.',
            ];
    }
}
