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
        'name'
    ];

    protected $primaryKey = 'id';

    public function FinalProjects() {
        return $this->hasMany(FinalProject::class);
    }
}
