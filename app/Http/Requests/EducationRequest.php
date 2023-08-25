<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
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
            'school_name' => 'required|string|max:255',
            'school_location' => 'required|string|max:255',
        ];
    }
    public function messages()
    {
        return [
            'school_name.required' => 'Nama sekolah diperlukan.',
            'school_name.string' => 'Nama sekolah harus berupa string.',
            'school_name.max' => 'Nama sekolah tidak boleh lebih dari 255 karakter.',
            
            'school_location.required' => 'Lokasi sekolah diperlukan.',
            'school_location.string' => 'Lokasi sekolah harus berupa string.',
            'school_location.max' => 'Lokasi sekolah tidak boleh lebih dari 255 karakter.',
        ];
    }
}
