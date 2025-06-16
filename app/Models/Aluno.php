<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $table = "aluno";

    protected $fillable = [
        'nome',
        'cpf',
        'telefone',
        'imagem',
        'categoria_id',
    ];

    public function categoria(){
        return $this->belongsTo(CategoriaAluno::class,'categoria_id');
    }
}




