<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'student_id' => 'required|unique:students',
            'name' => 'required',
            'address' => 'required',
            'religion' => 'required',
            'birthdate' => 'required|date',
            'gender' => 'required|in:male,female',
            'phone_number' => 'required',
            'email' => 'required|email|unique:students',
            'education_id' => 'required',
            'cv_id' => 'required',
            'proposals_id' => 'required',
        ];
    }
}
