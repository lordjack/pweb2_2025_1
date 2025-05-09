<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = "curso";

    protected $fillable = [
        'nome',
        'requisito',
        'carga_horaria',
        'valor',
    ];

    //relação 1 curso para N turmas
    public function turmas()
    {
        return $this->hasMany(Turma::class);
    }
}
