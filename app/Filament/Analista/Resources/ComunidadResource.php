<?php

namespace App\Filament\Analista\Resources;

use App\Filament\Analista\Resources\ComunidadResource\Pages;
use App\Filament\Analista\Resources\ComunidadResource\RelationManagers;
use App\Models\Comunidad;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;


class ComunidadResource extends Resource
{
    protected static ?string $model = Comunidad::class;

    protected static ?string $navigationLabel = 'Comunidades';
    protected static ?string $label = 'Comunidades';
    protected static ?string $navigationIcon = 'heroicon-s-home';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('estado_id')
                    ->relationship('estado', 'id')
                    ->required(),
                Forms\Components\Select::make('municipio_id')
                    ->relationship('municipio', 'id')
                    ->required(),
                Forms\Components\Select::make('parroquia_id')
                    ->relationship('parroquia', 'id')
                    ->required(),
                Forms\Components\TextInput::make('comunidad')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('estado.estado')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('municipio.municipio')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('parroquia.parroquia')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('comunidad')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    ExportBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
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
