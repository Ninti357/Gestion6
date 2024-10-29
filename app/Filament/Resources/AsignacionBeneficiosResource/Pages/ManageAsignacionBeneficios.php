<?php

namespace App\Filament\Resources\AsignacionBeneficiosResource\Pages;

use App\Filament\Resources\AsignacionBeneficiosResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageAsignacionBeneficios extends ManageRecords
{
    protected static string $resource = AsignacionBeneficiosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
