<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
        // dd("test");
        return [
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'price' => "required",
            'duration' => "required",
            'user_id' => "required"
        ];
    }

     public function messages(): array
    {

        return ['name.required' => 'The course name is required.',
            'name.string' => 'The course name must be a string.',
            'name.max' => 'The course name may not be greater than 255 characters.',
            'name.unique' => 'The course name has already been taken.',
            'description.max' => 'The description may not be greater than 1000 characters.',
            'description.min' => 'The description must be at least 10 characters.',
            'price.required' => 'The course price is required.',
            'duration.required' => 'The course duration is required.',
            ];
    }
}
