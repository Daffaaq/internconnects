<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $birthdate = '2000-01-01';
        $age = Carbon::parse($birthdate)->age;
        DB::table('students')->insert([
            'student_id' => 2041720098,
            'name' => 'Nama Siswa',
            'address' => 'Alamat Siswa',
            'religion' => 'Agama Siswa',
            'birthdate' => '2000-01-01',
            'age' => $age, // Set umur yang sudah dihitung
            'gender' => 'male',
            'phone_number' => '08123456789',
            'email' => 'siswa1@gmail.com',
            'education_id' => 1,
            'cv_id' => 1,
            'proposals_id' => 1,
        ]);
    }
}
