<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\students;

class proposals extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_proposals',
        'upload_date',
        'upload_time',
    ];

    // Relasi ke tabel Student (contoh jika setiap proposal dimiliki oleh satu mahasiswa)
    public function student()
    {
        return $this->hasOne(students::class, 'proposals_id');
    }
}
