<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'name',
        'address',
        'religion',
        'birthdate',
        'gender',
        'phone_number',
        'email',
        'age', // Tambah kolom umur pada fillable
        'education_id',
        'cv_id',
        'proposals_id',
    ];

    // Definisi untuk menghitung umur berdasarkan tanggal lahir
    public function getAgeAttribute()
    {
        return Carbon::parse($this->birthdate)->age;
    }
}   
