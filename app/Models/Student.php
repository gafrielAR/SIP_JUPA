<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'nrp',
        'name',
        'study_program_id',
        'semester',
        'parallel',
        'guardian_lecturer_id',
        'status',
        'birth_date',
        'birth_place',
        'date_of_entry',
        'gender',
        'citizenship',
        'religion_id',
        'blood_type',
        'address',
        'phone',
        'graduate_date',
        'acceptance_path_id'
    ];

    protected $dates = [
        'birth_date',
        'date_of_entry',
        'graduate_date',
    ];

    protected $primaryKey = 'id';

    public function study_program() {
        return $this->belongsTo(StudyProgram::class, 'study_program_id', 'id');
    }

    public function guardian_lecturer() {
        return $this->belongsTo(Lecturer::class, 'guardian_lecturer_id');
    }

    public function religion() {
        return $this->belongsTo(Religion::class);
    }

    public function acceptance_path() {
        return $this->belongsTo(AcceptancePath::class, 'acceptance_path_id', 'id');
    }

    public function final_projects() {
        return $this->hasMany(FinalProject::class);
    }
}
