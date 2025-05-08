<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //select * from cursos
        $dados = Curso::All();

        return view(
            'curso.list',
            ['dados' => $dados]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('curso.form');
    }

    public function edit(string $id)
    {
        return view('curso.form');
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

        Curso::create($data);

        return redirect('curso');
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

        Curso::updateOrCreate(
            ['id' => $id],
            $data
        );

        return redirect('curso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //  dd("teste");
        $dado = Curso::find($id);

        $dado->delete();

        return redirect('curso');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            //select * from cursos
            $dados = Curso::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Curso::all();
        }

        return view(
            'curso.list',
            ['dados' => $dados]
        );
    }

    public function report()
    {
        $cursos = Curso::orderBy('nome')->get();

        $data = [
            'titulo' => "Listagem Alunos",
            'cursos' => $cursos,
        ];

        $pdf = Pdf::loadView('curso.report', $data);
        return $pdf->download('relatorio_listagem_cursos.pdf');
    }
}
