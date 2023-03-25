<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $table = 'materias';
    protected $guarded = ['id'];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    //Relación uno a muchos invertida
    public function grupo() {
        return $this->belongsTo(Grupo::class);
    }

    //Relacion uno a muchos
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
