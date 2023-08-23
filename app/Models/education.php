<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class education extends Model
{
    use HasFactory;

     protected $fillable = [
        'school_name',
        'school_location',
    ];

    // Relasi ke tabel Student (contoh jika setiap pendidikan dimiliki oleh satu mahasiswa)
    public function students()
    {
        return $this->hasMany(Student::class, 'education_id');
    }
}
