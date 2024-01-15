<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Student extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $fillable = ['nim', 'name', 'email', 'address', 'prodi_id', 'mobile'];

    public function prodi()
    {
        return $this->belongsTo(ProgramStudy::class, 'prodi_id');
    }
}
