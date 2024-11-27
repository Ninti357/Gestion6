<?php

namespace App\Filament\Director\Widgets;

use App\Models\AsignacionBeneficios;
use App\Models\Pueblo;
use App\Models\Persona;
use App\Models\Comunidad;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsAdminOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $pueblos = Pueblo::count();
        $comunidades = Comunidad::count();
        $personas = Persona::count();
        $beneficiosAsignados = AsignacionBeneficios::count();

        $hombres = Persona::where('genero_id', 2)->count();
        $mujeres = Persona::where('genero_id', 3)->count();

        // dd  ($personas);
        return [
            Stat::make('Comunidades', $comunidades),
            Stat::make('Pueblos', $pueblos),
            Stat::make('Personas registradas', $personas),
            // ->description('32k increase')
            // ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Beneficios asignados', $beneficiosAsignados)
            // ->description('32k increase')
            // ->descriptionIcon('heroicon-m-arrow-trending-up'),
        ];
    }
}
