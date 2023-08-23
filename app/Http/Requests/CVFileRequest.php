<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CVFileRequest extends FormRequest
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
            'file_cv' => 'required|mimes:pdf,png,jpg|max:100000',
        ];
    }
    public function messages()
    {
        return [
            'file_cv.required' => 'The CV file is required.',
            'file_cv.mimes' => 'The CV file must be a PDF, PNG, or JPG.',
            'file_cv.max' => 'The CV file may not be larger than 2MB.',
        ];
    }
}
