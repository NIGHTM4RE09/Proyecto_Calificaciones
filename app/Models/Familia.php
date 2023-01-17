<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    use HasFactory;

    protected $table = 'familias';
    protected $guarded = ['id'];
    protected $hiddem = [
        'created_at',
        'updated_at'
    ];

    //Relacion uno a uno(inverso)
    public function alumno()
    {
        return $this->belongsTo('App\Models\Alumno');
    }
}
