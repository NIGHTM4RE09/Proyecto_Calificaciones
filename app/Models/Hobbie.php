<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobbie extends Model
{
    use HasFactory;

    protected $table = 'hobbies';
    protected $guarded = ['id'];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    //Relacion uno a uno(inverso)
    public function alumno()
    {
        return $this->belongsTo('App\Models\Alumno');
    }
}
