<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Internship Position</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Add Internship Position</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('guest.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Form untuk tabel students -->
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                name="email" required>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <label for="nim" class="form-label">NIM/NISN</label>
            <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim"
                name="nim" required>
            @error('nim')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                required>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <label for="address" class="form-label">Alamat Lengkap</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                name="address" required>
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <label for="religion" class="form-label">AGAMA</label>
            <input type="text" class="form-control @error('religion') is-invalid @enderror" id="religion"
                name="religion" required>
            @error('religion')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <label for="birthdate" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate"
                name="birthdate" required onchange="calculateAge()">
            @error('birthdate')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <div class="mt-3">
                <label for="age" class="form-label">Umur</label>
                <input type="text" class="form-control" id="age" name="age" readonly>
            </div>

            <label for="gender" class="form-label">Jenis Kelamin</label>
            <input type="text" class="form-control @error('gender') is-invalid @enderror" id="gender"
                name="gender" required>
            @error('gender')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <label for="phone_number" class="form-label">No Telepon</label>
            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                name="phone_number" required>
            @error('phone_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <!-- Form untuk tabel education -->
            <label for="school_name" class="form-label">Nama Sekolah</label>
            <input type="text" class="form-control @error('school_name') is-invalid @enderror" id="school_name"
                name="school_name" required>
            @error('school_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <label for="school_location" class="form-label">Lokasi Sekolah</label>
            <input type="text" class="form-control @error('school_location') is-invalid @enderror"
                id="school_location" name="school_location" required>
            @error('school_location')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <!-- Form untuk tabel categoryinterns -->
            <label for="duration" class="form-label">Durasi Magang/PKL</label>
            <input type="text" class="form-control @error('duration') is-invalid @enderror" id="duration"
                name="duration" required>
            @error('duration')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <!-- Form untuk tabel internship_temps -->
            <label for="internship_position" class="form-label">Posisi yang Akan dilamar</label>
            <input type="text" class="form-control @error('internship_position') is-invalid @enderror"
                id="internship_position" name="internship_position" required>
            @error('internship_position')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <!-- Form untuk tabel internships -->
            <label for="start_date" class="form-label">Mulai Magang/PKL</label>
            <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date"
                name="start_date" required>
            @error('start_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <label for="end_date" class="form-label">Selesai Magang/PKL</label>
            <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date"
                name="end_date" required>
            @error('end_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <!-- Form untuk tabel curriculumvitaes -->
            <label for="file_cv" class="form-label">Curriculum Vitae File</label>
            <input type="file" class="form-control @error('file_cv') is-invalid @enderror" id="file_cv"
                name="file_cv" accept=".pdf,.png,.jpg" required>
            @error('file_cv')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <!-- Form untuk tabel proposals -->
            <label for="file_proposals" class="form-label">Proposals File</label>
            <input type="file" class="form-control @error('file_proposals') is-invalid @enderror"
                id="file_proposals" name="file_proposals" accept=".pdf" required>
            @error('file_proposals')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <div class="d-flex justify-content-between">
                    <a href="{{ route('landingpage') }}" class="btn btn-outline-secondary mt-3">Kembali</a>
                    <button type="submit" class="btn btn-primary mt-3">Tambah</button>
            </div>
        </form>
    </div>

    <script>
        function calculateAge() {
            var birthdate = new Date(document.getElementById("birthdate").value);
            var today = new Date();
            var age = today.getFullYear() - birthdate.getFullYear();

            // Jika bulan kelahiran lebih besar dari bulan saat ini atau bulan kelahiran sama dengan bulan saat ini dan tanggal kelahiran lebih besar dari tanggal saat ini, kurangi umur
            if (birthdate.getMonth() > today.getMonth() || (birthdate.getMonth() === today.getMonth() && birthdate
                    .getDate() > today.getDate())) {
                age--;
            }

            document.getElementById("age").value = age;
        }
    </script>

</body>

</html>
