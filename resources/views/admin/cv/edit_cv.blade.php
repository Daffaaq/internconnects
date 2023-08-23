<!DOCTYPE html>
<html>

<head>
    <title>Edit Curriculum Vitae</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link href="/css/createdept.css" rel="stylesheet">
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
            <h2 class="h3 text-center mb-4">Edit Curriculum Vitae</h2>
            <form action="{{ route('admin.cv.update', $cv->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="file_cv" class="form-label">Curriculum Vitae File</label>
                    <input type="file" class="form-control @error('file_cv') is-invalid @enderror" id="file_cv"
                        name="file_cv" accept=".pdf,.png,.jpg">
                    @error('file_cv')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.cv') }}" class="btn btn-outline-secondary mt-3">Kembali</a>
                    <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
