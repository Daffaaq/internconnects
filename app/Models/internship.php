<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\students;
use App\Models\internship_temp;

class internship extends Model
{
    use HasFactory;

    protected $fillable = ['start_date', 'end_date','input_date', 'input_time', 'students_id', 'internshiptemps_id'];

    public function student()
    {
        return $this->belongsTo(students::class, 'students_id');
    }

    public function internshipTemp()
    {
        return $this->belongsTo(internship_temp::class, 'internshiptemps_id');
    }
}
