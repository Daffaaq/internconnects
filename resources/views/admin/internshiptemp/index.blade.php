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
        <h1 class="notes-title">List Internship Sementara</h1>
        <div class="add-note">
            {{-- <a href="{{ route('admin.education.create') }}" class="add-note-button">Add CV</a> --}}
        </div>
        <div class="notes-list">
            {{-- @foreach ($educations as $educations)
                <div class="note-card">
                    <h2>Education</h2>
                    <a class="education">{{ $educations->school_name }}</a>
                    <a class="education">{{ $educations->school_location }}</a>
                    <a href="{{ $educations->file_cv }}" class="pdf-link">Download
                        Image</a>
                    <div class="note-date-time">
                        <p class="note-date"></p>
                        <p class="note-time"></p>
                    </div> 
                    <div class="note-icons">
                        <a href="{{ route('admin.education.edit', $educations->id) }}" class="icon-pencil"
                            title="Edit"></a>
                        <a href="{{ route('admin.education.destroy', $educations->id) }}"
                            onclick="event.preventDefault(); if (confirm('Temenan a?')) { document.getElementById('delete-form-{{ $educations->id }}').submit(); }"
                            class="icon-trash" title="Delete"></a>
                        <form id="delete-form-{{ $educations->id }}"
                            action="{{ route('admin.education.destroy', $educations->id) }}" method="POST"
                            style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            @endforeach --}}
            <!-- ... (Catatan lainnya) ... -->

            <!-- Add more note cards here -->
        </div>
    </div>
@endsection
