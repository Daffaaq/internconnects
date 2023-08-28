<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoryintern extends Model
{
    use HasFactory;

    protected $fillable = [
        'duration',
    ];
    public function internshipTemps()
    {
        return $this->hasMany(InternshipTemp::class);
    }
}
