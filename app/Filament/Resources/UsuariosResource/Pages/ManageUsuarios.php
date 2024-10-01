<?php

namespace App\Filament\Resources\UsuariosResource\Pages;

use App\Filament\Resources\UsuariosResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageUsuarios extends ManageRecords
{
    protected static string $resource = UsuariosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
