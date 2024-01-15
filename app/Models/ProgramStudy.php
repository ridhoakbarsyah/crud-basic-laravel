<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudy extends Model
{
    use HasFactory;

    protected $table = 'program_study';
    protected $primaryKey = 'id';
    protected $fillable = ['program_study'];

    public function jurusan()
    {
        return $this->hasOne(Student::class, 'prodi_id');
    }
}
