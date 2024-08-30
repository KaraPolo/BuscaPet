<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Perdido;
use Illuminate\Support\Facades\DB;

class GraficoQtdPerdido
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {

        /*

        SELECT COUNT(1) AS 'qtd_perdido_categoria',
            categorias.nome FROM perdidos
            INNER JOIN categorias ON categorias.id = perdidos.categoria_id
            GROUP BY categoria_id
        */
        $perdidos = DB::table("perdidos")
                    ->selectRaw('count(1) as qtd_perdido_categoria,categorias.nome as nome_categoria')
                    ->join('categorias','categorias.id', '=','perdidos.categoria_id')
                    ->groupBy('categoria_id')->get();

        $qtdPerdidos = [];
        $nomeCategorias = [];

        foreach($perdidos as $item){
            $qtdPerdidos[]= $item->qtd_perdido_categoria;
            $nomeCategorias[]= $item->nome_categoria;
        }
       // dd($qtdPerdidos);

        return $this->chart->pieChart()
            ->setTitle('Quantidade de Animais Perdidos')
            ->setSubtitle('Classificação por sexo')
            ->addData($qtdPerdidos)
            ->setLabels($nomeCategorias);
    }
}
