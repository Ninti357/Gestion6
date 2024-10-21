<?php

namespace App\Filament\Resources\AsignacionDeBeneficiosResource\Pages;

use App\Filament\Resources\AsignacionDeBeneficiosResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageAsignacionDeBeneficios extends ManageRecords
{
    protected static string $resource = AsignacionDeBeneficiosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
