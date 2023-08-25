<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InternshipRequest extends FormRequest
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
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'input_date' => 'required|date',
            'input_time' => 'required|time',
            'student_id' => 'required|exists:students,id',
            'cv_id' => 'required|exists:cvs,id',
            'proposal_id' => 'required|exists:proposals,id',
            'education_id' => 'required|exists:educations,id',
            'internship_category_id' => 'required|exists:internship_categories,id',
            'internship_temp_id' => 'required|exists:internship_temps,id',
        ];
    }
}
