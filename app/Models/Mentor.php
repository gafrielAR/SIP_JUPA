<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $table = 'mentors';

    protected $fillable = [
        'name'
    ];

    protected $primaryKey = 'id';

    public function mainFinalProjects() {
        return $this->hasMany(FinalProject::class, 'first_mentor', 'id');
    }

    public function subFinalProjects() {
        return $this->hasMany(FinalProject::class, 'secondary_mentor', 'id');
    }
}
