<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AsignacionBeneficiosResource\Pages;
use App\Filament\Resources\AsignacionBeneficiosResource\RelationManagers;
use App\Models\AsignacionBeneficios;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AsignacionBeneficiosResource extends Resource
{
    protected static ?string $model = AsignacionBeneficios::class;

    protected static ?string $navigationLabel = 'Asignación de beneficios';

    protected static ?string $navigationIcon = 'heroicon-s-gift';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('persona_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('tipo_beneficio_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('beneficio_id')
                    ->required()
                    ->numeric(),
            ]);
    }





    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('persona_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tipo_beneficio_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('beneficio_id')
                    ->numeric()
                    ->sortable(),
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
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageAsignacionBeneficios::route('/'),
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
