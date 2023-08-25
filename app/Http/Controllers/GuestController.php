<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InternshipStoreRequest;
use App\Models\internship;
use App\Models\curriculumvitae;
use App\Models\proposals;
use App\Models\students;
use App\Models\education;
use App\Models\categoryintern;
use App\Models\internship_temp;

class GuestController extends Controller
{
    public function form()
    {
        // Dapatkan data yang diperlukan untuk dropdown atau opsi
        $cvList = curriculumvitae::all();
        $proposalList = proposals::all();
        $studentList = students::all();
        $educationList = education::all();
        $internshipCategoryList = categoryintern::all();
        $internshipTempList = internship_temp::all();

        return view('guestform.form', compact(
            'cvList', 'proposalList', 'studentList', 
            'educationList', 'internshipCategoryList', 'internshipTempList'
        ));
    }

    public function store(InternshipStoreRequest $request)
    {
        // Panggil method store() yang ada di dalam class request
        $request->store();

        return redirect()->route('landingpage')
            ->with('success', 'Internship position added successfully!');
    }
}
