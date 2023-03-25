<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'alumnos';
    protected $guarded = ['id'];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

    //Relación uno a muchos invertida
    public function grupo() {
        return $this->belongsTo('App\Models\Grupo');
    }

    //Relación uno a muchos invertida
    public function tutot() {
        return $this->belongsTo('App\Models\Tutor');
    }

    //Relacion uno a uno
    public function datos()
    {
        return $this->hasOne('App\Models\Dato');
    }

    //Relacion uno a uno
    public function habitos()
    {
        return $this->hasOne('App\Models\Habito');
    }

    //Relacion uno a uno
    public function hobbies()
    {
        return $this->hasOne('App\Models\Hobbie');
    }

    //Relacion uno a uno
    public function areas()
    {
        return $this->hasOne('App\Models\Area');
    }

    //Relacion uno a uno
    public function ambitoescolar()
    {
        return $this->hasOne('App\Models\School');
    }

    //Relacion uno a uno
    public function ambitofamiliar()
    {
        return $this->hasOne('App\Models\Familia');
    }

    //Relacion muchos a muchos
    public function contactos()
    {
        return $this->belongsToMany('App\Models\Contacto');
    }

    //Relacion muchos a muchos
    public function hijos()
    {
        return $this->belongsToMany('App\Models\Hijo');
    }

    //Relacion muchos a muchos
    public function padres()
    {
        return $this->belongsToMany('App\Models\Padre');
    }

    //Relacion muchos a muchos
    public function families()
    {
        return $this->belongsToMany('App\Models\Family');
    }

    //Relación uno a muchos
    public function notes() {
        return $this->hasMany(Note::class);
    }

    public function averageScore()
{
    return $this->notes()->with('materia')->avg('note');
}

}
