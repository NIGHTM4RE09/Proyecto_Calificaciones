<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    protected $table = 'tutors';
    protected $guarded = ['id'];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];




    //Relación uno a muchos
    public function alumnos() {
        return $this->belongsToMany('App\Models\Alumno');
    }
}
