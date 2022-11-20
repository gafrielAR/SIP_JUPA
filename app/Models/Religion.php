<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    use HasFactory;

    protected $table = 'religions';

    protected $fillable = [
        'name'
    ];

    protected $primaryKey = 'id';

    public function lecturers() {
        return $this->hasMany(Lecturer::class);
    }

    public function students() {
        return $this->hasMany(Student::class);
    }
}
