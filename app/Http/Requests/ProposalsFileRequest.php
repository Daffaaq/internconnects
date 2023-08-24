<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProposalsFileRequest extends FormRequest
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
            'file_proposals' => 'required|mimes:pdf,doc,docx|max:102400',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'file_proposals.required' => 'The proposals file is required.',
            'file_proposals.mimes' => 'The proposals file must be a PDF, DOC, or DOCX.',
            'file_proposals.max' => 'The proposals file must not exceed 100MB.',
        ];
    }
}
