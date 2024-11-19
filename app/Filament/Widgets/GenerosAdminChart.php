<?php

namespace App\Filament\Widgets;

use App\Models\Persona;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class GenerosAdminChart extends ChartWidget
{
    protected static ?string $heading = 'Género';

    protected function getData(): array
    {
        $generos = Persona::select(DB::raw('count(*) as count'), 'genero_id', 'generos.genero')
        ->join('generos', 'generos.id', '=', 'personas.genero_id')
        ->groupBy('genero_id', 'generos.genero', 'generos.id')
        ->orderBy('generos.id', 'asc')
        ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Generos',
                    'data' => $generos->pluck('count'),
                    'backgroundColor' => [
                        'rgb(255, 206, 86)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 99, 132)',
                        'rgb(99, 255, 125)',
                    ]
                ],
            ],
            'labels' =>  $generos->pluck('genero'),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
