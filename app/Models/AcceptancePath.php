<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcceptancePath extends Model
{
    use HasFactory;

    protected $table = 'acceptance_paths';

    protected $fillable = [
        'name'
    ];

    protected $primaryKey = 'id';

    public function students() {
        return $this->hasMany(Student::class);
    }
}
