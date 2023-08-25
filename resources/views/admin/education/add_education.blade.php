<!DOCTYPE html>
<html>

<head>
    <title>Tambah Pendidikan</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5 mb-5 d-flex justify-content-center">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="col-lg-6 shadow p-4 bg-light" id="form-all">
            <h2 class="h3 text-center mb-4">Tambah Pendidikan</h2>
            <form action="{{ route('admin.education.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="school_name" class="form-label">Nama Sekolah</label>
                    <input type="text" class="form-control @error('school_name') is-invalid @enderror"
                        id="school_name" name="school_name" required>
                    @error('school_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="school_location" class="form-label">Lokasi Sekolah</label>
                    <input type="text" class="form-control @error('school_location') is-invalid @enderror"
                        id="school_location" name="school_location" required>
                    @error('school_location')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.education') }}" class="btn btn-outline-secondary mt-3">Kembali</a>
                    <button type="submit" class="btn btn-primary mt-3">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
