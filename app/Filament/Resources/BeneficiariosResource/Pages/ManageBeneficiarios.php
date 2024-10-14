<?php

namespace App\Filament\Resources\BeneficiariosResource\Pages;

use App\Filament\Resources\BeneficiariosResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBeneficiarios extends ManageRecords
{
    protected static string $resource = BeneficiariosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
