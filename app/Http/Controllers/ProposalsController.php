<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\proposals;
use App\Http\Requests\ProposalsFileRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProposalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proposals = proposals::all();
        return view('admin.proposals.index', compact('proposals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.proposals.add_proposals');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    private function storeProposalsFile($request)
    {
        $file = $request->file('file_proposals');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/proposals', $fileName);

        return $fileName;
    }

    public function store(ProposalsFileRequest  $request)
    {
        $fileName = $this->storeProposalsFile($request);

        proposals::create([
            'file_proposals' => $fileName,
            'upload_date' => now()->toDateString(),
            'upload_time' => now()->toTimeString(),
        ]);

        return redirect()->route('admin.proposals')->with('success', 'Proposal has been uploaded successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(proposals $proposals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proposals = proposals::find($id);
        return view('admin.proposals.edit_proposals', compact('proposals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProposalsFileRequest $request, proposals $proposals)
    {

        if ($request->hasFile('file_proposals')) {
            // Hapus file proposals lama dari direktori publik
            $oldfileprops = public_path('proposals/' . $proposals->file_proposals);
            if (File::exists($oldfileprops)) {
                File::delete($oldfileprops);
            }
            
            // Upload file proposals yang baru
            $fileName = $this->storeProposalsFile($request);

            // Update data CV dengan file CV yang baru
            $proposals->update([
                'file_proposals' => $fileName,
                'upload_date' => now()->toDateString(),
                'upload_time' => now()->toTimeString(),
            ]);
        }

        return redirect()->route('admin.proposals')->with('success', 'Proposal has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(proposals $proposal)
    {
        // Hapus file CV dari direktori publik
        $filePath = public_path('proposals/' . $proposal->file_proposals);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        $proposal->delete();

        return redirect()->route('admin.proposals')->with('success', 'Proposal has been deleted.');
    }
}
