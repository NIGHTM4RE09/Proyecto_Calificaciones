<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $table = 'groups';
    protected $guarded = ['id'];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

    //Relación uno a muchos invertida
    public function nivel() {
        return $this->belongsTo('App\Models\Nivel');
    }

    //Relación uno a muchos
    public function alumnos() {
        return $this->belongsToMany('App\Models\Alumno');
    }

    //Relacion uno a uno(inverso)
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
