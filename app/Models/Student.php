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
        'birht_place',
        'gender',
        'citizenship',
        'religion_id',
        'blood_type',
        'address',
        'phone',
        'graduate_date',
        'acceptance_path_id'
    ];

    protected $primaryKey = 'id';

    public function study_program() {
        return $this->hasOne(StudyProgram::class);
    }

    public function guardian_lecturer() {
        return $this->hasOne(Lecturer::class, 'guardian_lecturer_id');
    }

    public function relogion() {
        return $this->hasOne(Religion::class);
    }

    public function acceptance_path() {
        return $this->hasOne(AcceptancePath::class);
    }

    public function final_projects() {
        return $this->hasMany(FinalProject::class);
    }
}
