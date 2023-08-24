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
        <h1 class="notes-title">Proposals</h1>
        <div class="add-note">
            <a href="{{ route('admin.proposals.create') }}" class="add-note-button">Add proposals</a>
        </div>
        <div class="notes-list">
            @foreach ($proposals as $proposal)
                <div class="note-card">
                    <h2>Proposal</h2>
                    @if (in_array(pathinfo($proposal->file_proposals, PATHINFO_EXTENSION), ['pdf']))
                        <a href="{{ Storage::url('proposals/' . $proposal->file_proposals) }}" class="pdf-link">Download
                            PDF</a>
                   @elseif (in_array(pathinfo($proposal->file_proposals, PATHINFO_EXTENSION), ['doc', 'docx']))
                        <a href="{{ Storage::url('proposals/' . $proposal->file_proposals) }}" class="pdf-link"
                            id="download-link">Download DOCX</a>
                        @if ($proposal->pdf_proposals)
                            <a href="{{ Storage::url('proposals/' . $proposal->pdf_proposals) }}" class="pdf-link"
                                id="download-pdf">Download PDF</a>
                        @endif
                    @else
                        <a href="{{ Storage::url('proposals/' . $proposal->file_proposals) }}" class="pdf-link">Download
                            Image</a>
                    @endif
                    <div class="note-date-time">
                        <p class="note-date">Date: {{ $proposal->upload_date }}</p>
                        <p class="note-time">Time: {{ $proposal->upload_time }}</p>
                    </div>
                    {{-- <div class="note-icons">
                <a href="{{ route('admin.proposals.edit', $proposal) }}" class="icon-pencil" title="Edit"></a>
                <a href="{{ route('admin.proposals.destroy', $proposal) }}"
                    onclick="event.preventDefault(); if (confirm('Are you sure?')) { document.getElementById('delete-form').submit(); }"
                    class="icon-trash" title="Delete"></a>
                <form id="delete-form" action="{{ route('admin.proposals.destroy', $proposal) }}" method="POST"
                    style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div> --}}
                </div>
            @endforeach
            <!-- ... (Catatan lainnya) ... -->
        </div>

    </div>
    <script>
        document.getElementById('download-link').addEventListener('click', function(event) {
            if (!confirm('Are you sure you want to download the DOCX file?')) {
                event.preventDefault(); // Mencegah tindakan default (unduh file)
            }
        });
    </script>
@endsection
