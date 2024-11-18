<?php

namespace App\Filament\Director\Resources\PersonaResource\Pages;

use App\Filament\Director\Resources\PersonaResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePersonas extends ManageRecords
{
    protected static string $resource = PersonaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
