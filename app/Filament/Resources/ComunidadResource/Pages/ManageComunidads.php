<?php

namespace App\Filament\Resources\ComunidadResource\Pages;

use App\Filament\Resources\ComunidadResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageComunidads extends ManageRecords
{
    protected static string $resource = ComunidadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
