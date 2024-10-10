<?php

namespace App\Filament\Resources\TipoBeneficioResource\Pages;

use App\Filament\Resources\TipoBeneficioResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTipoBeneficios extends ManageRecords
{
    protected static string $resource = TipoBeneficioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
