<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    protected $table = 'contactos';
    protected $guarded = ['id'];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];




    //Relación muchos a muchos
    public function alumnos()
    {
        return $this->belongsToMany('App\Models\Alumno');
    }
}
