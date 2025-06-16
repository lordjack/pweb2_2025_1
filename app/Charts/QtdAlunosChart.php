<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class QtdAlunosChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        /*
        SELECT COUNT(1) AS qtd_alunos, c.nome AS nome_curso FROM matricula m
            INNER JOIN curso c ON c.id = m.curso_id
            GROUP BY c.nome
        */

        $matriculas = DB::table('matricula')
            ->selectRaw("count(1) as qtd_alunos, curso.nome as nome_curso")
            ->join('curso','curso.id','matricula.curso_id')
            ->groupBy('curso.nome')
            ->get();

        $qtdAlunos = [];
        $qtdNomecurso = [];

        foreach($matriculas as $item){
            $qtdAlunos[] = $item->qtd_alunos;
            $qtdNomecurso[] = $item->nome_curso;
        }

        // dd($qtdNomecurso,$qtdAlunos);

        return $this->chart->pieChart()
            ->setTitle('Qtd Alunos Matriculados')
            ->setSubtitle('Semestre 2025.1')
            ->addData( $qtdAlunos)
            ->setLabels($qtdNomecurso);
    }
}
