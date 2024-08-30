<?php

namespace App\Http\Controllers;

use App\Models\Doacao;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Charts\GraficoQtdDoacao;
use PDF;

class DoacaoController extends Controller
{

    private $pagination = 2;

    public function index()
    {
        //app/http/Controller
        $dados = Doacao::paginate($this->pagination);

        // dd($dados);

        return view("doacao.list", ["dados" => $dados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();

        return view("doacao.form", ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //app/http/Controller

        $request->validate([
            'nome' => "required|max:300",
            'idade' => "required|max:300",
            'raca' => "required|max:300",
            'sexo' => "nullable",
            'caracteristicas' => "required|max:300",
            'historia' => "required|max:300",
            'saude' => "required|max:300",
            'observacao' => "required|max:300",
            'responsavel' => "required|max:300",
            'telefone' => "required|max:300",
            'imagem' => "nullable|image|mimes:png,jpeg,jpg",
        ], [
            'nome.required' => "O :attribute é obrigatório",
            'nome.max' => "Só é permitido 300 caracteres",
            'idade.required' => "A :attribute é obrigatória",
            'idade.max' => "Só é permitido 300 caracteres",
            'raca.required' => "A :attribute é obrigatória",
            'raca.max' => "Só é permitido 300 caracteres",
            'caracteristicas.required' => "As :attribute são obrigatórias",
            'caracteristicas.max' => "Só é permitido 300 caracteres",
            'historia.required' => "A :attribute é obrigatória",
            'historia.max' => "Só é permitido 300 caracteres",
            'saude.required' => "A :attribute é obrigatória",
            'saude.max' => "Só é permitido 300 caracteres",
            'observacao.required' => "A :attribute é obrigatória",
            'observacao.max' => "Só é permitido 300 caracteres",
            'responsavel.required' => "O :attribute é obrigatório",
            'responsavel.max' => "Só é permitido 300 caracteres",
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
            $diretorio = "imagem/doacao/";

            $imagem->storeAs($diretorio, $nome_arquivo, 'public');

            $data['imagem'] = $diretorio . $nome_arquivo;
        }


        Doacao::create($data);

        return redirect('doacao');
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
        $dado = Doacao::findOrFail($id);

        $categorias = Categoria::all();

        return view("doacao.form", [
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
            'nome' => "required|max:300",
            'idade' => "required|max:300",
            'raca' => "required|max:300",
            'sexo' => "nullable",
            'caracteristicas' => "required|max:300",
            'historia' => "required|max:300",
            'saude' => "required|max:300",
            'observacao' => "required|max:300",
            'responsavel' => "required|max:300",
            'telefone' => "required|max:300",
            'imagem' => "nullable|image|mimes:png,jpeg,jpg",
        ], [
            'nome.required' => "O :attribute é obrigatório",
            'nome.max' => "Só é permitido 300 caracteres",
            'idade.required' => "A :attribute é obrigatória",
            'idade.max' => "Só é permitido 300 caracteres",
            'raca.required' => "A :attribute é obrigatória",
            'raca.max' => "Só é permitido 300 caracteres",
            'caracteristicas.required' => "As :attribute são obrigatórias",
            'caracteristicas.max' => "Só é permitido 300 caracteres",
            'historia.required' => "A :attribute é obrigatória",
            'historia.max' => "Só é permitido 300 caracteres",
            'saude.required' => "A :attribute é obrigatória",
            'saude.max' => "Só é permitido 300 caracteres",
            'observacao.required' => "A :attribute é obrigatória",
            'observacao.max' => "Só é permitido 300 caracteres",
            'responsavel.required' => "O :attribute é obrigatório",
            'responsavel.max' => "Só é permitido 300 caracteres",
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
            $diretorio = "imagem/doacao/";

            $imagem->storeAs($diretorio, $nome_arquivo, 'public');

            $data['imagem'] = $diretorio . $nome_arquivo;
        }

        Doacao::updateOrCreate(
            ['id' => $request->id],
            $data
        );

        return redirect('doacao');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dado = Doacao::findOrFail($id);
        // dd($dado);
        $dado->delete();

        return redirect('doacao');
    }

    public function search(Request $request)
    {
        if (!empty($request->nome)) {
            $dados = Doacao::where(
                "nome",
                "like",
                "%" . $request->nome . "%"
            )->paginate($this->pagination);
        } else {
            $dados = Doacao::paginate($this->pagination);
        }
        // dd($dados);

        return view("doacao.list", ["dados" => $dados]);
    }


    public function report()
    {
        $doacaos = Doacao::All();

        $data = [
            'titulo' => 'Relatório Doacaos2',
            'doacaos'=> $doacaos,
        ];

        $pdf = PDF::loadView('doacao.report', $data);

        return $pdf->download('relatorio_doacaos.pdf');
    }

}
