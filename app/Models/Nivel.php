<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;

    protected $table = 'levels';
    protected $guarded = ['id'];

    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

    //Relación uno a muchos invertida
    public function ciclo() {
        return $this->belongsTo('App\Models\Ciclo');
    }

    //Relación uno a muchos
    public function grupos() {
        return $this->belongsToMany('App\Models\Grupo');
    }
}
