<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalProject extends Model
{
    use HasFactory;

    protected $table = 'final_projects';

    protected $fillable = [
        'student_id',
        'first_mentor',
        'second_mentor',
        'title',
        'lab_id',
        'proposal_date',
        'proposal_revision_date',
        'final_project_date',
        'final_project_status'
    ];

    protected $dates = [
        'proposal_date',
        'proposal_revision_date',
        'final_project_date'
    ];

    protected $primaryKey = 'id';

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function stMentor() {
        return $this->belongsTo(Lecturer::class, 'first_mentor');
    }

    public function ndMentor() {
        return $this->belongsTo(Lecturer::class, 'second_mentor');
    }

    public function lab() {
        return $this->belongsTo(Lab::class);
    }
}
