<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
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
            //
        ];
    }

    public function store()
    {
        // Simpan data ke tabel Students
        $student = students::create([
            'email' => $this->input('student_email'),
            // ... Lanjutkan dengan atribut-atribut lainnya
        ]);

        // Simpan data ke tabel Education
        $education = education::create([
            'school_name' => $this->input('school_name'),
            // ... Lanjutkan dengan atribut-atribut lainnya
        ]);

        // Simpan data ke tabel CategoryIntern
        $categoryIntern = categoryintern::create([
            'category_name' => $this->input('category_intern'),
        ]);

        // Simpan data ke tabel InternshipTemp
        $internshipTemp = internship_temp::create([
            'internship_position' => $this->input('internship_position'),
        ]);
        // Simpan data ke tabel curriculumvitae
        $internshipTemp = curriculumvitae::create([
            'cv_file' => $this->input('cv_file'),
        ]);
        // Simpan data ke tabel proposals
        $internshipTemp = proposals::create([
            'proposal_file' => $this->input('proposal_file'),
        ]);

        // Simpan data ke tabel Internship
        $internship = internship::create([
            'start_date' => $this->input('start_date'),
            'end_date' => $this->input('end_date'),
            // ... Lanjutkan dengan atribut-atribut lainnya
            'input_date' => now()->format('Y-m-d'),
            'input_time' => now()->format('H:i'),
            'student_id' => $student->id,
            'cv_id' => $cv->id,
            'proposal_id' => $proposal->id,
            'education_id' => $education->id,
            'internship_category_id' => $categoryIntern->id,
            'internship_temp_id' => $internshipTemp->id,
        ]);
    }
}
