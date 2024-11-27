<?php

namespace App\Filament\Analista\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use App\Models\AsignacionBeneficios;

class TiposBeneficiosAdminChart extends ChartWidget
{
    protected static ?string $heading = 'Tipos de Beneficios Otorgados';

    protected function getData(): array
    {
        $tiposBeneficios = AsignacionBeneficios::select(DB::raw('count(*) as count', 'tipo_beneficio_id'), 'tipo_beneficio')
        ->join('tipos_beneficios', 'tipos_beneficios.id', '=', 'asignacion_beneficios.tipo_beneficio_id')
        ->groupBy('tipo_beneficio_id', 'tipo_beneficio')
        ->get();

        return [
            'datasets' => [
                [
            'label' => 'Tipos de Beneficios Otorgados',
                    'data' => $tiposBeneficios->pluck('count'),
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' =>  $tiposBeneficios->pluck('tipo_beneficio'),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
