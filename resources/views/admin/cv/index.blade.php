@extends('admin.layouts.master')
@section('content')
    {{-- <div class="main"> --}}
    <div class="topbar">
        <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
        </div>

        <div class="search">
            <label>
                <input type="text" placeholder="Search here">
                <ion-icon name="search-outline"></ion-icon>
            </label>
        </div>

        <div class="user">
            <img src="{{ asset('assets') }}/imgs/customer01.jpg" alt="">
        </div>
    </div>

    <div class="notes-container">
        <h1 class="notes-title">Curicullum Vitae</h1>
        <div class="add-note">
            <a href="{{ route('admin.cv.create') }}" class="add-note-button">Add CV</a>
        </div>
        <div class="notes-list">
            @foreach ($curriculumVitaes as $curriculumVitaes)
                <div class="note-card">
                    <h2>CV</h2>
                    @if (in_array(pathinfo($curriculumVitaes->file_cv, PATHINFO_EXTENSION), ['pdf']))
                        <a href="{{ Storage::url('cv_files/' . $curriculumVitaes->file_cv) }}" class="pdf-link">Download
                            PDF</a>
                    @else
                        <a href="{{ Storage::url('cv_files/' . $curriculumVitaes->file_cv) }}" class="pdf-link">Download
                            Image</a>
                    @endif
                    <div class="note-date-time">
                        <p class="note-date">Date: {{ $curriculumVitaes->upload_date }}</p>
                        <p class="note-time">Time: {{ $curriculumVitaes->upload_time }}</p>
                    </div>
                    <div class="note-icons">
                        <a href="{{ route('admin.cv.edit', $curriculumVitaes) }}" class="icon-pencil" title="Edit"></a>
                        <a href="{{ route('admin.cv.destroy', $curriculumVitaes) }}"
                            onclick="event.preventDefault(); if (confirm('Temenan a?')) { document.getElementById('delete-form').submit(); }"
                            class="icon-trash" title="Delete"></a>
                        <form id="delete-form" action="{{ route('admin.cv.destroy', $curriculumVitaes) }}" method="POST"
                            style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>

                </div>
            @endforeach
            <!-- ... (Catatan lainnya) ... -->

            <!-- Add more note cards here -->
        </div>
    </div>
@endsection
