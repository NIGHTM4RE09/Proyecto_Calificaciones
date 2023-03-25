<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $table = 'notes';
    protected $guarded = ['id'];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'note',
        'month_id',
        'alumno_id',
        'materia_id',
    ];

    //Relacion uno a muchos invertida
    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    //Relación uno a muchos invertida
    public function alumno() {
        return $this->belongsTo(Alumno::class);
    }

    //Relación uno a muchos invertida
    public function mes() {
        return $this->belongsTo(Month::class);
    }
}
