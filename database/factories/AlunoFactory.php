<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Aluno;

class AlunoFactory extends Factory
{

    protected $model = Aluno::class;

    public function definition(): array
    {
        return [
            'nome'=> $this->fake->name,
            'cpf'=> $this->fake->randomNumber(14, false),
            'telefone'=> $this->fake->cellphone(),
        ];
    }
}
