<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Turma;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TurmaController extends Controller
{
    public function index(Curso $curso)
    {
        $dados = $curso->turmas;
        return view('turma.list', ['dados' => $dados, 'curso' => $curso]);
    }

    public function create(Curso $curso)
    {
        return view('turma.form', ['curso' => $curso]);
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);

        $data = $request->all();
        $turma = Turma::create($data);

        return redirect()->route('curso.turmas', $turma->curso_id);
    }

    public function edit(string $id)
    {
        $dado = Turma::findOrFail($id);
        $cursos = Curso::orderBy('nome')->get();

        return view('turma.form', [
            'dado' => $dado,
            'cursos' => $cursos
        ]);
    }

    public function update(Request $request, string $id)
    {
        $this->validateRequest($request);

        $data = $request->all();
        $turma = Turma::updateOrCreate(
            ['id' => $id],
            $data
        );

        return redirect()->route('curso.turmas', $turma->curso_id);
    }

    public function destroy(string $id)
    {
        $dado = Turma::findOrFail($id);
        $dado->delete();

        return redirect()->route('curso.turmas', $dado->curso_id);
    }

    private function validateRequest(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3|max:100',
            'codigo' => 'required|max:20',
            'curso_id' => 'required|exists:curso,id',
            'data_inicio' => 'nullable|date',
            'data_fim' => 'nullable|date|after:data_inicio',
        ]);
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Turma::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Turma::all();
        }

        return view('turma.list', ['dados' => $dados]);
    }

    public function report()
    {
        $turmas = Turma::orderBy('nome')->get();

        $data = [
            'titulo' => "Listagem de Turmas",
            'turmas' => $turmas,
        ];

        $pdf = Pdf::loadView('turma.report', $data);
        return $pdf->download('relatorio_listagem_turmas.pdf');
    }
}
