<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Comunidad;
use App\Models\Municipio;
use App\Models\Parroquia;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\APIGeoController;
use App\Filament\Resources\ComunidadResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\ComunidadResource\RelationManagers;

class ComunidadResource extends Resource
{
    protected static ?string $model = Comunidad::class;

    // protected static ?string $navigationGroup = 'Administración';

    protected static ?string $navigationLabel = 'Comunidades';
    protected static ?string $label = 'Comunidades';
    protected static ?string $navigationIcon = 'heroicon-s-home';

    public static function form(Form $form): Form
    {
        $estados = new APIGeoController();
        $arrayEstados = [];
        foreach ($estados->estados() as $estado) {
            $arrayEstados[$estado['id']] = $estado['estado'];
        }
        dd($estados->municipios());
        return $form
            ->schema([
                Forms\Components\Select::make('estado_id')
                    ->options($arrayEstados)
                    ->searchable()
                    ->preload()
                    ->live()
                    ->afterStateUpdated(function (Set $set) {
                        $set('municipio_id', null);
                        $set('parroquia_id', null);
                    })
                    ->required(),

                Forms\Components\Select::make('municipio_id')
                    ->label('Municipio')
                    ->options(fn(Get $get): Collection => Municipio::query()
                        ->where('estado_id', $get('estado_id'))
                        ->pluck('municipio', 'id'))
                    ->searchable()
                    ->preload()
                    ->live()
                    ->afterStateUpdated(fn(Set $set) => $set('parroquia_id', null))
                    ->required(),

                Forms\Components\Select::make('parroquia_id')
                    ->label('Parroquia')
                    ->options(fn(Get $get): Collection => Parroquia::query()
                        ->where('municipio_id', $get('municipio_id'))
                        ->pluck('parroquia', 'id'))
                    ->searchable()
                    ->preload()
                    ->live()
                    ->required(),

                Forms\Components\TextInput::make('comunidad')
                    ->required()
                    ->maxLength(20),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('comunidad')
                    ->searchable(),
                Tables\Columns\TextColumn::make('estado.estado')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('municipio.municipio')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('parroquia.parroquia')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de registro')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Fecha de actualización')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->label('Fecha de inhabilitación')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                Tables\Filters\SelectFilter::make('Estado')
                    ->relationship('estado', 'estado')
                    ->multiple(),
                Tables\Filters\SelectFilter::make('Municipio')
                    ->relationship('municipio', 'municipio')
                    ->multiple(),
                Tables\Filters\SelectFilter::make('Parroquia')
                    ->relationship('parroquia', 'parroquia')
                    ->multiple(),

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->label('Inhabilitar'),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    ExportBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageComunidads::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
