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

        <form method="POST" action="{{ route('guest.store') }}">
            @csrf

            <!-- Form untuk tabel students -->
            <label for="student_email">Student Email:</label>
            <input type="text" id="student_email" name="student_email" required>

            <label for="student_name">Student Name:</label>
            <input type="text" id="student_name" name="student_name" required>

            <label for="student_address">Student Address:</label>
            <input type="text" id="student_address" name="student_address" required>

            <label for="student_religion">Student Religion:</label>
            <input type="text" id="student_religion" name="student_religion" required>

            <label for="student_birthday">Student birthday:</label>
            <input type="date" id="student_birthday" name="student_birthday" required>

            <label for="student_gender">Student gender:</label>
            <input type="text" id="student_gender" name="student_gender" required>

            <label for="student_phonenumber">Student Phone Number:</label>
            <input type="text" id="student_phonenumber" name="student_phonenumber" required>

            <!-- Form untuk tabel education -->
            <label for="school_name">School Name:</label>
            <input type="text" id="school_name" name="school_name" required>

            <label for="school_location">School Location:</label>
            <input type="text" id="school_location" name="school_location" required>

            <!-- Form untuk tabel categoryinterns -->
            <label for="category_intern">Category Intern:</label>
            <input type="text" id="category_intern" name="category_intern" required>

            <!-- Form untuk tabel internship_temps -->
            <label for="internship_position">Internship Position:</label>
            <input type="text" id="internship_position" name="internship_position" required>

            <!-- Form untuk tabel internships -->
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" required>

            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" required>

            <!-- Form untuk tabel curriculumvitaes -->
            <label for="cv_file">CV File:</label>
            <input type="file" id="cv_file" name="cv_file" required>

            <!-- Form untuk tabel proposals -->
            <label for="proposal_file">Proposal File:</label>
            <input type="file" id="proposal_file" name="proposal_file" required>

            <button type="submit">Add Internship Position</button>
        </form>
    </div>
</body>

</html>
