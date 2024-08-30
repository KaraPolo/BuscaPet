<?php

namespace App\Http\Controllers;

use App\Models\Encontrado;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Charts\GraficoQtdEncontrado;
use PDF;

class EncontradoController extends Controller
{

    private $pagination = 2;

    public function index()
    {
        //app/http/Controller
        $dados = Encontrado::paginate($this->pagination);

        // dd($dados);

        return view("encontrado.list", ["dados" => $dados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();

        return view("encontrado.form", ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //app/http/Controller

        $request->validate([
            'caracteristicas' => "required|max:300",
            'saude' => "required|max:300",
            'telefone' => "required|max:300",
            'imagem' => "nullable|image|mimes:png,jpeg,jpg",
        ], [
            'caracteristicas.required' => "As :attribute são obrigatórias",
            'caracteristicas.max' => "Só é permitido 300 caracteres",
            'saude.required' => "A :attribute é obrigatória",
            'saude.max' => "Só é permitido 300 caracteres",
            'telefone.required' => "O :attribute é obrigatório",
            'telefone.max' => "Só é permitido 300 caracteres",
            'imagem.image' => "Deve ser enviado uma imagem",
            'imagem.mimes' => "A imagem deve ser da extensão de PNG, JPEG ou JPG",
        ]);

        $data = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_arquivo =
                date('YmdHis') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/encontrado/";

            $imagem->storeAs($diretorio, $nome_arquivo, 'public');

            $data['imagem'] = $diretorio . $nome_arquivo;
        }


         Encontrado::create($data);

        return redirect('encontrado');
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
        $dado = Encontrado::findOrFail($id);

        $categorias = Categoria::all();

        return view("encontrado.form", [
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
            'caracteristicas' => "required|max:300",
            'saude' => "required|max:300",
            'telefone' => "required|max:300",
            'imagem' => "nullable|image|mimes:png,jpeg,jpg",
        ], [
            'caracteristicas.required' => "As :attribute são obrigatórias",
            'caracteristicas.max' => "Só é permitido 300 caracteres",
            'saude.required' => "A :attribute é obrigatória",
            'saude.max' => "Só é permitido 300 caracteres",
            'telefone.required' => "O :attribute é obrigatório",
            'telefone.max' => "Só é permitido 300 caracteres",
            'imagem.image' => "Deve ser enviado uma imagem",
            'imagem.mimes' => "A imagem deve ser da extensão de PNG, JPEG ou JPG",
        ]);


        $data = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_arquivo =
                date('YmdHis') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/encontrado/";

            $imagem->storeAs($diretorio, $nome_arquivo, 'public');

            $data['imagem'] = $diretorio . $nome_arquivo;
        }

        Encontrado::updateOrCreate(
            ['id' => $request->id],
            $data
        );

        return redirect('encontrado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dado = Encontrado::findOrFail($id);
        // dd($dado);
        $dado->delete();

        return redirect('encontrado');
    }

    public function search(Request $request)
    {
        if (!empty($request->caracteristicas)) {
            $dados = Encontrado::where(
                "caracteristicas",
                "like",
                "%" . $request->caracteristicas . "%"
            )->paginate($this->pagination);
        } else {
            $dados = Encontrado::paginate($this->pagination);
        }
        // dd($dados);

        return view("encontrado.list", ["dados" => $dados]);
    }

    public function chart(GraficoQtdEncontrado $encontradoChart)
    {
        return view("encontrado.chart", ["encontradoChart" => $encontradoChart->build()]);
    }

    public function report()
    {
        $encontrados = Encontrado::All();

        $data = [
            'titulo' => 'Relatório Encontrados2',
            'encontrados'=> $encontrados,
        ];

        $pdf = PDF::loadView('encontrado.report', $data);

        return $pdf->download('relatorio_encontrados.pdf');
    }

}
