<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class internship extends Model
{
    use HasFactory;

    protected $fillable = ['start_date', 'end_date', 'input_time', 'students_id', 'internshiptemps_id'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'students_id');
    }

    public function internshipTemp()
    {
        return $this->belongsTo(InternshipTemp::class, 'internshiptemps_id');
    }
}
