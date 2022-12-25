<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisStatus extends Model
{
    use HasFactory;
    use \Awobaz\Compoships\Compoships;
    
    protected $fillable = ['name'];

    public function student()
    {
        return $this->hasMany(Student::class, ['id', 'id'], ['status_ayah', 'status_ibu']);
    }
}
