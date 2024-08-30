<?php

namespace App\Http\Controllers;

use App\Models\Perdido;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Charts\GraficoQtdPerdido;
use PDF;
use DB;

class PerdidoController extends Controller
{

    private $pagination = 2;

    public function index()
    {
        $dados = Perdido::paginate($this->pagination);
        return view("perdido.list", ["dados" => $dados]);
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view("perdido.form", ['categorias' => $categorias]);
    }

    public function store(Request $request)
    {
        //app/http/Controller

        $request->validate([
            'nome' => "required|max:100",
            'idade' => "required|max:16",
            'especie' => "required|max:50",
            'raca' => "required|max:50",
            'categoria_id' => "required",
            'caracteristicas' => "required|max:200",
            'porte' => "required|max:10",
            'data' => "required|max:10",
            'local' => "required|max:100",
            'responsavel' => "required|max:50",
            'telefone' => "required|max:30",
            'recompensa' => "required|max:50",
            'imagem' => "nullable|image|mimes:png,jpeg,jpg",
        ], [
            'nome.required' => "O :attribute é obrigatório",
            'nome.max' => "Só é permitido 100 caracteres",
            'idade.required' => "A :attribute é obrigatória",
            'idade.max' => "Só é permitido 16 caracteres",
            'especie.required' => "A :attribute é obrigatória",
            'especie.max' => "Só é permitido 50 caracteres",
            'raca.required' => "A :attribute é obrigatória",
            'raca.max' => "Só é permitido 50 caracteres",
            'categoria_id.required' => "A :attribute é obrigatória",
            'caracteristicas.required' => "As :attribute são obrigatórias",
            'caracteristicas.max' => "Só é permitido 200 caracteres",
            'porte.required' => "O :attribute é obrigatório",
            'porte.max' => "Só é permitido 10 caracteres",
            'data.required' => "A :attribute é obrigatória",
            'data.max' => "Só é permitido 10 caracteres",
            'local.required' => "O :attribute é obrigatório",
            'local.max' => "Só é permitido 100 caracteres",
            'responsavel.required' => "O :attribute é obrigatório",
            'responsavel.max' => "Só é permitido 50 caracteres",
            'telefone.required' => "O :attribute é obrigatório",
            'telefone.max' => "Só é permitido 30 caracteres",
            'recompensa.required' => "A :attribute é obrigatória",
            'recompensa.max' => "Só é permitido 50 caracteres",
            'imagem.image' => "Deve ser enviado uma imagem",
            'imagem.mimes' => "A imagem deve ser da extensão de PNG, JPEG ou JPG",
        ]);

        $data = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_arquivo = date('YmdHis') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/perdido/";
            $imagem->storeAs($diretorio, $nome_arquivo, 'public');
            $data['imagem'] = $diretorio . $nome_arquivo;
        }

        Perdido::create($data);

        return redirect('perdido');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $dado = Perdido::findOrFail($id);
        $categorias = Categoria::all();

        return view("perdido.form", [
            'dado' => $dado,
            'categorias' => $categorias
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => "required|max:100",
            'idade' => "required|max:16",
            'especie' => "required|max:50",
            'raca' => "required|max:50",
            'categoria_id' => "required",
            'caracteristicas' => "required|max:200",
            'porte' => "required|max:10",
            'data' => "required|max:10",
            'local' => "required|max:100",
            'responsavel' => "required|max:50",
            'telefone' => "required|max:30",
            'recompensa' => "required|max:50",
            'imagem' => "nullable|image|mimes:png,jpeg,jpg",
        ], [
            'nome.required' => "O :attribute é obrigatório",
            'nome.max' => "Só é permitido 100 caracteres",
            'idade.required' => "A :attribute é obrigatória",
            'idade.max' => "Só é permitido 16 caracteres",
            'especie.required' => "A :attribute é obrigatória",
            'especie.max' => "Só é permitido 50 caracteres",
            'raca.required' => "A :attribute é obrigatória",
            'raca.max' => "Só é permitido 50 caracteres",
            'categoria_id.required' => "A :attribute é obrigatória",
            'caracteristicas.required' => "As :attribute são obrigatórias",
            'caracteristicas.max' => "Só é permitido 200 caracteres",
            'porte.required' => "O :attribute é obrigatório",
            'porte.max' => "Só é permitido 10 caracteres",
            'data.required' => "A :attribute é obrigatória",
            'data.max' => "Só é permitido 10 caracteres",
            'local.required' => "O :attribute é obrigatório",
            'local.max' => "Só é permitido 100 caracteres",
            'responsavel.required' => "O :attribute é obrigatório",
            'responsavel.max' => "Só é permitido 50 caracteres",
            'telefone.required' => "O :attribute é obrigatório",
            'telefone.max' => "Só é permitido 30 caracteres",
            'recompensa.required' => "A :attribute é obrigatória",
            'recompensa.max' => "Só é permitido 50 caracteres",
            'imagem.image' => "Deve ser enviado uma imagem",
            'imagem.mimes' => "A imagem deve ser da extensão de PNG, JPEG ou JPG",
        ]);

        $data = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_arquivo = date('YmdHis') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/perdido/";
            $imagem->storeAs($diretorio, $nome_arquivo, 'public');
            $data['imagem'] = $diretorio . $nome_arquivo;
        }

        Perdido::updateOrCreate(
            ['id' => $request->id],
            $data
        );

        return redirect('perdido');
    }

    public function destroy($id)
    {
        $dado = Perdido::findOrFail($id);

        // Deleta os registros relacionados na tabela atualizacaos
        DB::table('atualizacaos')->where('perdido_id', $id)->delete();

        // Agora deleta o registro da tabela perdidos
        $dado->delete();

        return redirect('perdido');
    }

    public function search(Request $request)
    {
        if (!empty($request->nome)) {
            $dados = Perdido::where(
                "nome",
                "like",
                "%" . $request->nome . "%"
            )->paginate($this->pagination);
        } else {
            $dados = Perdido::paginate($this->pagination);
        }
        return view("perdido.list", ["dados" => $dados]);
    }

    public function chart(GraficoQtdPerdido $perdidoChart)
    {
        return view("perdido.chart", ["perdidoChart" => $perdidoChart->build()]);
    }

    public function report()
    {
        $perdidos = Perdido::All();

        $data = [
            'titulo' => 'Relatório Perdidos2',
            'perdidos'=> $perdidos,
        ];

        $pdf = PDF::loadView('perdido.report', $data);

        return $pdf->download('relatorio_perdidos.pdf');
    }
}
