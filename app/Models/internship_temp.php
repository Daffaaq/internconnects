<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class internship_temp extends Model
{
    use HasFactory;

    protected $fillable = ['internship_position', 'category_id'];

    public function category()
    {
        return $this->belongsTo(CategoryIntern::class, 'category_id');
    }
}
