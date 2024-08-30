<?php

namespace App\Http\Controllers;

use App\Models\Cuidado;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Charts\GraficoQtdCuidado;
use PDF;

class CuidadoController extends Controller
{

    private $pagination = 2;

    public function index()
    {
        //app/http/Controller
        $dados = Cuidado::paginate($this->pagination);

        // dd($dados);

        return view("cuidado.list", ["dados" => $dados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();

        return view("cuidado.form", ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //app/http/Controller

        $request->validate([
            'titulo' => "required|max:300",
            'descricao' => "required|max:300",
            'valor' => "required|max:300",
        ], [
            'titulo.required' => "O :attribute é obrigatório",
            'titulo.max' => "Só é permitido 300 caracteres",
            'descricao.required' => "A :attribute é obrigatória",
            'descricao.max' => "Só é permitido 300 caracteres",
            'valor.required' => "O :attribute é obrigatório",
            'valor.max' => "Só é permitido 300 caracteres",
        ]);

        $data = $request->all();


         Cuidado::create($data);

        return redirect('cuidado');
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
    public function edit(string $id)
    {
        $dado = Cuidado::findOrFail($id);

        $categorias = Categoria::all();

        return view("cuidado.form", [
            'dado' => $dado,
            'categorias' => $categorias
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //app/http/Controller

        $request->validate([
            'titulo' => "required|max:300",
            'descricao' => "required|max:300",
            'valor' => "required|max:300",
        ], [
            'titulo.required' => "O :attribute é obrigatório",
            'titulo.max' => "Só é permitido 300 caracteres",
            'descricao.required' => "A :attribute é obrigatória",
            'descricao.max' => "Só é permitido 300 caracteres",
            'valor.required' => "O :attribute é obrigatório",
            'valor.max' => "Só é permitido 300 caracteres",
        ]);


        $data = $request->all();


        Cuidado::updateOrCreate(
            ['id' => $request->id],
            $data
        );

        return redirect('cuidado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dado = Cuidado::findOrFail($id);
        // dd($dado);
        $dado->delete();

        return redirect('cuidado');
    }

    public function search(Request $request)
    {
        if (!empty($request->titulo)) {
            $dados = Cuidado::where(
                "titulo",
                "like",
                "%" . $request->titulo . "%"
            )->paginate($this->pagination);
        } else {
            $dados = Cuidado::paginate($this->pagination);
        }
        // dd($dados);

        return view("cuidado.list", ["dados" => $dados]);
    }

    public function report()
    {
        $cuidados = Cuidado::All();

        $data = [
            'titulo' => 'Relatório Cuidados2',
            'cuidados'=> $cuidados,
        ];

        $pdf = PDF::loadView('cuidado.report', $data);

        return $pdf->download('relatorio_cuidados.pdf');
    }

}
