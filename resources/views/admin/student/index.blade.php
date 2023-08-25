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
        <h1 class="notes-title">LIST Students</h1>
        <div class="add-note">
            <a href="#" class="add-note-button">Add Superadmin</a>
        </div>
        <div class="notes-list">
            @foreach ($students as $students)
                <div class="note-card">
                    <h2>Superadmin</h2>
                    <p>{{ $students->name }}</p>
                    <div class="note-date-time">
                        <p class="note-date">Alamat: {{ $students->address }}</p>
                        <p class="note-time">Agama: {{ $students->religion }}</p>
                    </div>
                    <div class="note-date-time">
                        <p class="note-date">Tanggal lahir: {{ $students->birthdate }}</p>
                        <p class="note-time">Jenis Kelamin: {{ $students->gender }}</p>
                    </div>
                    <div class="note-date-time">
                        <p class="note-date">Email: {{ $students->phone_number }}</p>
                        <p class="note-time">Role: {{ $students->email }}</p>
                    </div>
                    <div class="note-date-time">
                        <p class="note-date">Email: {{ $students->age }}</p>
                    </div>
                    <div class="note-icons">
                        <span class="icon-trash"></span>
                        <span class="icon-pencil"></span>
                    </div>
                </div>
            @endforeach
            <!-- ... (Catatan lainnya) ... -->

            <!-- Add more note cards here -->
        </div>
    </div>
@endsection
