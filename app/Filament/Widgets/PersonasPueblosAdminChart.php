<?php

namespace App\Filament\Widgets;

use App\Models\Persona;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class PersonasPueblosAdminChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        $pueblos = Persona::select(DB::raw('count(*) as count'), 'pueblo_id', 'pueblos.pueblo')
        ->join('pueblos', 'pueblos.id', '=', 'personas.pueblo_id')
        ->groupBy('pueblo_id', 'pueblos.pueblo', 'pueblos.id')
        ->orderBy('pueblos.id', 'asc')
        ->get();
        return [
            'datasets' => [
                [
            'label' => 'Pueblos',
                    'data' => $pueblos->pluck('count'),
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' =>  $pueblos->pluck('pueblo'),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
