<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    protected $table = 'lecturers';

    protected $fillable = [
        'name',
        'nip',
        'position',
        'years_of_service',
        'months_of_service',
        'study_program_id',
        'status',
        'birth_date',
        'birth_place',
        'gender',
        'citizenship',
        'religion_id',
        'blood_type',
        'address',
        'phone',
        'direct_supervisor_id',
        'nidn_nupn',
        'karis_karsus'
    ];

    protected $dates = [
        'birth_date'
    ];

    protected $primaryKey = 'id';

    public function study_program() {
        return $this->belongsTo(StudyProgram::class);
    }

    public function religion() {
        return $this->belongsTo(Religion::class);
    }

    public function direct_supervisor() {
        return $this->hasOne(Lecturer::class, 'direct_supervisor_id');
    }

    public function subordinates() {
        return $this->hasMany(Lecturer::class, 'direct_supervisor_id');
    }

    public function main_final_projects() {
        return $this->hasMany(FinalProject::class, 'first_mentor');
    }

    public function sub_final_projects() {
        return $this->hasMany(FinalProject::class, 'secondary_mentor');
    }

}
