<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    protected $fillable = [
        'name'
    ];

    protected $primaryKey = 'id';

    public function study_programs() {
        return $this->hasMany(StudyProgram::class);
    }
}
