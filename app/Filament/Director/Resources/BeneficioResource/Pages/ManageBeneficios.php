<?php

namespace App\Filament\Director\Resources\BeneficioResource\Pages;

use App\Filament\Director\Resources\BeneficioResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBeneficios extends ManageRecords
{
    protected static string $resource = BeneficioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
