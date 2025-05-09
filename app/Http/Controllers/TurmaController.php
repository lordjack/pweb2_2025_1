<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index(Curso $curso)
    {
        $dados = $curso->turmas;

        return view(
            'turma.list',
            [
                'dados' => $dados,
                'curso' => $curso
            ]
        );
    }

    public function create(Curso $curso)
    {
        return view('turma.form', ['curso' => $curso]);
    }

    public function edit(string $id)
    {
        $dado = Turma::findOrFail($id);
        $cursos = Curso::orderBy('nome')->get();

        return view('turma.form',  [
            'dado' => $dado,
            'cursos' => $cursos
        ]);
    }

    private function validateRequest(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3|max:100',
        ], [
            'nome.required' => 'O :attribute é obrigatório',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);

        $data = $request->all();

        $turma = Turma::create($data);

        return redirect()->route('curso.turmas', $turma->curso_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd("teste", $id);
        $dado = Turma::findOrFail($id);

        $dado->delete();

        return redirect()->route('curso.turmas', $dado->curso_id);
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            //select * from turmas
            $dados = Turma::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Turma::all();
        }

        return view(
            'turma.list',
            ['dados' => $dados]
        );
    }

    public function report()
    {
        $turmas = Turma::orderBy('nome')->get();

        $data = [
            'titulo' => "Listagem Alunos",
            'turmas' => $turmas,
        ];

        $pdf = Pdf::loadView('turma.report', $data);
        return $pdf->download('relatorio_listagem_turmas.pdf');
    }
}
