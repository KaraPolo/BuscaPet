<?php

namespace App\Http\Controllers;

use App\Models\Atualizacao;
use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\Dono;
use App\Models\Perdido;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Charts\NotasPerdidoChart;
use App\Charts\MediaNotasPerdidoChart;

class AtualizacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $pagination = 5;

    public function index()
    {
        $atualizacaos = Atualizacao::paginate($this->pagination);

        //dd($atualizacaos[1]->dono);

        return view('atualizacao.list',[
            'dados'=> $atualizacaos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuss = Status::all();
        $donos = Dono::all();
        $perdidos = Perdido::all();

        return view("atualizacao.form", [
            'statuss' => $statuss,
            'donos' => $donos,
            'perdidos' => $perdidos,
        ]);
    }
    public function store(Request $request)
    {
        //app/http/Controller
        $request->validate([
            'status_id' => "required",
            'dono_id' => "required",
            'perdido_id' => "required",
            'data_atualizacao' => "required|date",
        ], [
            'status_id.required' => "O status é obrigatório",
            'dono_id.required' => "O nome do dono é obrigatório",
            'perdido_id.required' => "O nome do animal perdido é obrigatório",
            'data_atualizacao.required' => "A data não pode ser deixada vazia",
        ]);
        Atualizacao::create($request->all());

        return redirect('atualizacao');
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
        $dado = Atualizacao::findOrFail($id);

        $statuss = Status::all();
        $donos = Dono::all();
        $perdidos = Perdido::all();

        return view("atualizacao.form", [
            'dado'=> $dado,
            'statuss' => $statuss,
            'donos' => $donos,
            'perdidos' => $perdidos,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status_id' => "required",
            'dono_id' => "required",
            'perdido_id' => "required",
            'data_atualizacao' => "required|date", 
        ], [
            'status_id.required' => "O status é obrigatório",
            'dono_id.required' => "O nome do dono é obrigatório",
            'perdido_id.required' => "O nome do animal perdido é obrigatório",
            'data_atualizacao.required' => "A data não pode ser deixada vazia",
        ]);

        Atualizacao::updateOrCreate(
            ['id' => $request->id],
            $request->all()
        );

        return redirect('atualizacao');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dado = Atualizacao::findOrFail($id);
        // dd($dado);
        $dado->delete();

        return redirect('atualizacao');
    }

    public function search(Request $request)
    {
        if (!empty($request->nome)) {
            $dados = Atualizacao::where(
                "nome",
                "like",
                "%" . $request->nome . "%"
            )->paginate($this->pagination);
        } else {
            $dados = Atualizacao::paginate($this->pagination);
        }
        // dd($dados);

        return view("atualizacao.list", ["dados" => $dados]);
    }

    public function detail($id)
    {
        $atualizacao = Atualizacao::find($id);

        $status = $atualizacao->status;
        $dono = $atualizacao->dono;
        $perdido = $atualizacao->perdido;

        //dd($atualizacao->dono);

        return view('atualizacao.detail',[
            'dado'=> $atualizacao,
            'status'=> $status,
            'dono'=> $dono,
            'perdido'=> $perdido,
        ]);
    }

    public function report() {

        $dados = Atualizacao::orderBy('id')->get();
        // dd( $dados );

        $pdf = Pdf::loadView('atualizacao.report', ['dados' => $dados]);

       // dd($pdf);

        return $pdf->download('listagem_atualizacaos.pdf');
    }


}
