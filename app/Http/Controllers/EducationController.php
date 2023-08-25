<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\education;
use App\Http\Requests\EducationRequest;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = education::all();
        return view('admin.education.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.education.add_education');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EducationRequest $request)
    {
        // Jika validasi berhasil, data yang masuk sudah otomatis divalidasi
        $data = $request->only(['school_name', 'school_location']);
        
        $education = education::create($data);

        return redirect()->route('admin.education')->with('success', 'Education added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($education)
    {
        $education = education::findOrFail($education);
        return view('admin.education.edit_education', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EducationRequest $request, $education)
    {
        $education = education::findOrFail($education);
        $data = $request->only(['school_name', 'school_location']);
        
        $education->update($data);

        return redirect()->route('admin.education')->with('success', 'Education updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($education)
    {
        $education = education::findOrFail($education);
        $education->delete();

        return redirect()->route('admin.education')->with('success', 'Education deleted successfully!');
    }
}
