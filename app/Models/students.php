<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\education;
use App\Models\curriculumvitae;
use App\Models\proposals;


class students extends Model
{
    use HasFactory;
    protected $fillable = [
        'nim',
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

    // Relasi dengan model Education
    public function education()
    {
        return $this->belongsTo(education::class);
    }

    // Relasi dengan model CurriculumVitae
    public function curriculumVitae()
    {
        return $this->belongsTo(curriculumvitae::class, 'cv_id');
    }

    // Relasi dengan model Proposal
    public function proposal()
    {
        return $this->belongsTo(proposals::class, 'proposals_id');
    }
}   
