<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\internshipfinalStoreRequest;
use App\Models\internship;
use App\Models\curriculumvitae;
use App\Models\proposals;
use App\Models\students;
use App\Models\education;
use App\Models\categoryintern;
use App\Models\internship_temp;
use Illuminate\Support\Facades\Log;

class GuestController extends Controller
{
    public function form()
    {
        // Dapatkan data yang diperlukan untuk dropdown atau opsi
        // $cvList = curriculumvitae::all();
        // $proposalList = proposals::all();
        // $studentList = students::all();
        // $educationList = education::all();
        // $internshipCategoryList = categoryintern::all();
        // $internshipTempList = internship_temp::all();

        // Mendapatkan data mahasiswa yang akan diedit (misalnya dengan ID tertentu)
        // $student = students::find($studentId);
        return view('guestform.form');

        // Logging data untuk pemeriksaan
        // Log::info('cvList:', ['data' => $cvList]);
        // Log::info('proposalList:', ['data' => $proposalList]);
        // Log::info('studentList:', ['data' => $studentList]);
        // Log::info('educationList:', ['data' => $educationList]);
        // Log::info('internshipCategoryList:', ['data' => $internshipCategoryList]);
        // Log::info('internshipTempList:', ['data' => $internshipTempList]);

        // return view('guestform.form', compact(
        //     'cvList', 'proposalList', 'studentList', 
        //     'educationList', 'internshipCategoryList', 'internshipTempList'
        // ));
    }

    private function generateFileName($file)
    {
        return time() . '_' . $file->getClientOriginalName();
    }

    private function storeFile($file, $path)
    {
        $fileName = $this->generateFileName($file);

        try {
            // Cek apakah file dengan nama yang sama sudah ada
            while (Storage::exists($path . '/' . $fileName)) {
                // Jika ya, tambahkan angka acak ke nama file
                $fileName = time() . '_' . rand(1000, 9999) . '_' . $file->getClientOriginalName();
            }

            $file->storeAs($path, $fileName);

            return $fileName;
        } catch (\Exception $e) {
            // Log error
            Log::error('Error while storing file: ' . $e->getMessage());

            // Return false or throw exception, depending on your use case
            // return false; // or throw $e;
        }
    }
    public function store(internshipfinalStoreRequest $request)
    {
        // Log sederhana untuk mengkonfirmasi pemanggilan method
        Log::info('store method is called.');
        try {
            // Store Curriculum Vitae File
            $cvFileName = $this->storeFile($request->file('file_cv'), 'public/cv_files');
            // Log nama file CV yang disimpan
            Log::info('CV file stored with filename: ' . $cvFileName);
            $cv = curriculumvitae::create([
                'file_cv' => $cvFileName,
                'upload_date' => now()->toDateString(),
                'upload_time' => now()->toTimeString(),
            ]);
            // Log ketika CV berhasil dibuat dalam database
            Log::info('CV created with ID: ' . $cv->id);


            // Store Proposals File
            $proposalsFileName = $this->storeFile($request->file('file_proposals'), 'public/proposalssave');
            Log::info('Proposal file stored with filename: ' . $proposalsFileName);
            $proposal = proposals::create([
                'file_proposals' => $proposalsFileName,
                'upload_date' => now()->toDateString(),
                'upload_time' => now()->toTimeString(),
            ]);
            // Log ketika CV berhasil dibuat dalam database
            Log::info('CV created with ID: ' . $proposal->id);

            // Store Education
            $education = education::create([
                'school_name' => $request->input('school_name'),
                'school_location' => $request->input('school_location'),
                // ... Add other attributes
            ]);
            // Log ketika CV berhasil dibuat dalam database
            Log::info('education created with ID: ' . $education->id);

            // Store Student
            $student = students::create([
                'nim' => $request->input('nim'),
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'religion' => $request->input('religion'),
                'birthdate' => $request->input('birthdate'),
                'gender' => $request->input('gender'),
                'phone_number' => $request->input('phone_number'),
                'email' => $request->input('email'),
                'education_id' => $education->id,
                'cv_id' => $cv->id,
                'proposals_id' => $proposal->id,
            ]);
            Log::info('students created with ID: ' . $student->id);

            // Store Category Intern
            $categoryIntern = categoryintern::create([
                'duration' => $request->input('duration'),
            ]);
            Log::info('categoryIntern created with ID: ' . $categoryIntern->id);

            // Store Internship Temp
            $internshipTemp = internship_temp::create([
                'internship_position' => $request->input('internship_position'),
                'category_id' => $categoryIntern->id,
            ]);
            Log::info('internshipTemp created with ID: ' . $internshipTemp->id);
            // Store Internship
            $internship = internship::create([
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                // ... Add other attributes
                'input_date' => now()->format('Y-m-d'),
                'input_time' => now()->format('H:i'),
                'student_id' => $student->id,
                'cv_id' => $cv->id,
                'proposal_id' => $proposal->id,
                'education_id' => $education->id,
                'internship_category_id' => $categoryIntern->id,
                'internship_temp_id' => $internshipTemp->id,
            ]);
            Log::info('Internship created with ID: ' . $internship->id);
            return redirect()->route('landingpage')
                ->with('success', 'Internship position added successfully!');
        } catch (\Exception $e) {
            // Log error
            Log::error('Error while storing data: ' . $e->getMessage());

            // Tampilkan pesan error kepada user
            return back()->withInput()->withErrors(['error' => 'An error occurred while storing data. Please try again later.']);
        }
    }
}
