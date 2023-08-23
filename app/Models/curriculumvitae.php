<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class curriculumvitae extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_cv',
        'upload_date',
        'upload_time'
    ];

    // Relasi ke tabel Student (contoh jika setiap CV dimiliki oleh satu mahasiswa)
    public function student()
    {
        return $this->hasOne(Student::class, 'cv_id');
    }
}
