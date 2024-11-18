<?php

namespace App\Filament\Director\Resources\ComunidadResource\Pages;

use App\Filament\Director\Resources\ComunidadResource;
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
