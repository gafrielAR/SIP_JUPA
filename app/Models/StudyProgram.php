<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyProgram extends Model
{
    use HasFactory;

    protected $table = 'study_programs';

    protected $fillable = [
        'departpemt_id',
        'education_programs',
        'major'
    ];

    protected $primaryKey = 'id';

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function lecturers() {
        return $this->hasMany(Lecturer::class);
    }

    public function students() {
        return $this->hasMany(Student::class);
    }
}
