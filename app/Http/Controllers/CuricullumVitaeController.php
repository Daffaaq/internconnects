<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\curriculumvitae;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CVFileRequest;

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

    private function storeCVFile($request)
    {
        $file = $request->file('file_cv');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/cv_files', $fileName);

        return $fileName;
    }

    public function store(CVFileRequest $request)
    {
        $fileName = $this->storeCVFile($request);

        CurriculumVitae::create([
            'file_cv' => $fileName,
            'upload_date' => now()->toDateString(),
            'upload_time' => now()->toTimeString(),
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
    public function edit(CurriculumVitae $cv)
    {
        return view('admin.cv.edit_cv', compact('cv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CVFileRequest $request, CurriculumVitae $cv)
    {
        if ($request->hasFile('file_cv')) {
            // Hapus file CV lama dari direktori publik
            $oldFilePath = public_path('cv_files/' . $cv->file_cv);
            if (File::exists($oldFilePath)) {
                File::delete($oldFilePath);
            }

            // Upload file CV yang baru
            $fileName = $this->storeCVFile($request);

            // Update data CV dengan file CV yang baru
            $cv->update([
                'file_cv' => $fileName,
                'upload_date' => now()->toDateString(),
                'upload_time' => now()->toTimeString(),
            ]);
        }

        return redirect()->route('admin.cv')->with('success', 'Curriculum Vitae has been updated.');
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

        return redirect()->route('admin.cv')->with('success', 'Curriculum Vitae has been deleted.');
    }
}
