<?php

namespace App\Models;

use App\Scopes\CompanyScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    use HasFactory;
    
    const degree_levels = array("School", "College", "Diploma", "Bachelors", "Masters");
    const class_school = array("Class-1", "Class-2","Class-3", "Class-4","Class-5", "Class-6","Class-7", "Class-8","Class-9", "Class-10");
    const class_college = array("Class-11", "Class-12");
    const class_uni = array("1st Year", "2nd Year", "3rd Year", "4th Year", "5th Year");
    

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
