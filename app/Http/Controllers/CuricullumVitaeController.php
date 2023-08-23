<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\curriculumvitae;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CuricullumVitaeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curriculumVitaes = CurriculumVitae::all();
        return view('admin.cv.index', compact('curriculumVitaes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cv.add_cv');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file_cv' => 'required|mimes:pdf,png,jpg|max:100000', // Format dan ukuran file yang diizinkan
        ],[
            'file_cv.required' => 'The CV file is required.',
            'file_cv.mimes' => 'The CV file must be a PDF, PNG, or JPG.',
            'file_cv.max' => 'The CV file may not be larger than 2MB.',
        ]);

        $file = $request->file('file_cv');
        $fileName = time() . '_' . $file->getClientOriginalName();
        Storage::putFileAs('public/cv_files', $file, $fileName);

        CurriculumVitae::create([
            'file_cv' => $fileName,
            'upload_date' => now()->toDateString(), // Tanggal saat ini
            'upload_time' => now()->toTimeString(), // Waktu saat ini
        ]);

        return redirect()->route('admin.cv')->with('success', 'Curriculum Vitae has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CurriculumVitae $cv)
    {
         return view('curriculumvitae.edit', compact('cv'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CurriculumVitae $cv)
    {
        return view('curriculumvitae.edit', compact('cv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CurriculumVitae $cv)
    {
        $request->validate([
            'file_cv' => 'nullable|mimes:pdf,png,jpg|max:100000', // Format dan ukuran file yang diizinkan
        ],[
            'file_cv.required' => 'The CV file is required.',
            'file_cv.mimes' => 'The CV file must be a PDF, PNG, or JPG.',
            'file_cv.max' => 'The CV file may not be larger than 2MB.',
        ]);

        if ($request->hasFile('file_cv')) {
            // Hapus file CV lama dari direktori publik
            $oldFilePath = public_path('cv_files/' . $cv->file_cv);
            if (File::exists($oldFilePath)) {
                File::delete($oldFilePath);
            }

            // Upload file CV yang baru
            $file = $request->file('file_cv');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('cv_files'), $fileName);

            // Update data CV dengan file CV yang baru
            $cv->update([
                'file_cv' => $fileName,
                'upload_date' => now()->toDateString(), // Tanggal saat ini
                'upload_time' => now()->toTimeString(), // Waktu saat ini
            ]);
        }

        return redirect()->route('curriculumvitae.index')->with('success', 'Curriculum Vitae has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CurriculumVitae $cv)
    {
        // Hapus file CV dari direktori publik
        $filePath = public_path('cv_files/' . $cv->file_cv);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        $cv->delete();

        return redirect()->route('curriculumvitae.index')->with('success', 'Curriculum Vitae has been deleted.');
    }
}
