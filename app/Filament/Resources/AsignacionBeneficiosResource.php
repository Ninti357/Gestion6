<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AsignacionBeneficiosResource\Pages;
use App\Filament\Resources\AsignacionBeneficiosResource\RelationManagers;
use App\Models\AsignacionBeneficios;
use App\Models\Beneficio;
use App\Models\TipoBeneficio;
use App\Models\Persona;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Illuminate\Support\Collection;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\SoftDeletes;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class AsignacionBeneficiosResource extends Resource
{
    protected static ?string $model = AsignacionBeneficios::class;

    protected static ?string $navigationLabel = 'Asignación de beneficios';

    protected static ?string $navigationIcon = 'heroicon-s-gift';

    public static function form(Form $form): Form
    {
        return $form
        ->schema( [
            Forms\Components\Select::make('tipo_beneficio_id')
                ->label('Tipo de beneficio')
                ->relationship('tipoBeneficio', 'tipo_beneficio')
                ->searchable()
                ->preload()
                ->live()
                ->required(),

            Forms\Components\Select::make('beneficio')
                ->label('Beneficio')
                ->relationship('beneficio', 'beneficio')
                ->searchable()
                ->preload()
                ->live()
                ->required(),

                Forms\Components\Select::make('persona_id')
                ->label('Persona')
                ->relationship('Persona', 'primer_nombre')
                ->searchable()
                ->preload()
                ->live()
                ->required(),
                Forms\Components\TextInput::make('Cantidad')
                ->mask('999')
                ->numeric()
                ->maxLength(3),
        ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tipo_beneficio.tipo_beneficio')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('beneficio.beneficio')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('persona.persona')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Cantidad')
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
                Tables\Actions\DeleteAction::make()->label('inhabilitar'),
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
