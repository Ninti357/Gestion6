<?php

namespace App\Filament\Widgets;

use App\Models\Persona;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class EstadosBeneficiadosAdminChart extends ChartWidget
{
    protected static ?string $heading = 'Estados';

    protected function getData(): array
    {
        $estados = Persona::select(DB::raw('count(*) as count'), 'estado_id', 'estados.estado')
        ->join('estados', 'estados.id', '=', 'personas.estado_id')
        ->groupBy('estado_id', 'estados.estado', 'estados.id')
        ->orderBy('estados.id', 'asc')
        ->get();

        return [
            'datasets' => [
                [
            'label' => 'Pueblos',
                    'data' => $estados->pluck('count'),
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' =>  $estados->pluck('estado'),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
