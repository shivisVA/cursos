<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        
    ];

    public function students(){
        return $this->belongsToMany(Student::class)->withPivot('enrrollment_date')->withTimestamps();
    }
}
