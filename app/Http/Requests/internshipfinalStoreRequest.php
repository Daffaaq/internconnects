<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\File;
use App\Models\internship;
use App\Models\curriculumvitae;
use App\Models\proposals;
use App\Models\students;
use App\Models\education;
use App\Models\categoryintern;
use App\Models\internship_temp;

class internshipfinalStoreRequest extends FormRequest
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
            //file cv
            'file_cv' => 'required|mimes:pdf,png,jpg|max:102400',
            //file proposal
            'file_proposals' => 'required|mimes:pdf|max:102400',
            //education
            'school_name' => 'required|string|max:255',
            'school_location' => 'required|string|max:255',
            //students
            'student_id' => 'required|string',
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
            //category intern
            'duration' => 'required',
            // interntemp
            'internship_position' => 'required|string|max:255',
            'category_id' => 'required|exists:category_interns,id',
            //internship
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'student_id' => 'required|exists:students,id',
            'cv_id' => 'required|exists:cvs,id',
            'proposal_id' => 'required|exists:proposals,id',
            'education_id' => 'required|exists:educations,id',
            'internship_category_id' => 'required|exists:internship_categories,id',
            'internship_temp_id' => 'required|exists:internship_temps,id',
        ];
    }
}
