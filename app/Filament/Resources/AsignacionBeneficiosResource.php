<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Persona;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Beneficio;
use Filament\Tables\Table;
use App\Models\TipoBeneficio;
use Filament\Resources\Resource;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\AsignacionBeneficios;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\AsignacionBeneficiosResource\Pages;
use App\Filament\Resources\AsignacionBeneficiosResource\RelationManagers;

class AsignacionBeneficiosResource extends Resource
{
    protected static ?string $model = AsignacionBeneficios::class;

    protected static ?string $navigationLabel = 'Asignación de beneficios';

    protected static ?string $navigationIcon = 'heroicon-s-gift';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('tipo_beneficio_id')
                ->label('Tipo de beneficio')
                ->relationship('tipoBeneficio', 'tipo_beneficio')
                ->searchable()
                ->preload()
                ->live()
                ->afterStateUpdated(function (Set $set) {
                    $set('beneficio_id', null);
                })
                ->required(),

            Forms\Components\Select::make('beneficio_id')
                ->label('Beneficio')
                ->options(fn(Get $get): Collection => Beneficio::query()
                    ->where('tipo_beneficio_id', $get('tipo_beneficio_id'))
                    ->pluck('beneficio', 'id'))
                ->searchable()
                ->preload()
                ->live()
                ->required(),


                // Forms\Components\Select::make('tipo_beneficio_id')
                //     ->label('Tipo de beneficio')
                //     ->relationship('tipoBeneficio', 'tipo_beneficio')
                //     ->searchable()
                //     ->preload()
                //     ->live()
                //     ->required(),

                // Forms\Components\Select::make('beneficio_id')
                //     ->label('Beneficio')
                //     ->relationship('beneficio', 'beneficio')
                //     ->searchable()
                //     ->preload()
                //     ->live()
                //     ->required(),

                Forms\Components\Select::make('persona_id')
                    ->label('Persona')
                    ->searchable()
                    ->getSearchResultsUsing(fn(string $search) => Persona::select([
                        DB::raw("CONCAT(primer_nombre, ' ', primer_apellido, ' ', cedula) as full_name"),
                        'id',
                    ])
                        ->where('cedula', '=', "{$search}")->limit(50)->pluck('full_name', 'id'))
                    ->getOptionLabelUsing(fn($value): ?string => Persona::find($value)?->name)
                    ->required(),

                Forms\Components\TextInput::make('cantidad')
                    ->required()
                    ->mask('999')
                    ->numeric()
                    ->maxLength(3),

                Forms\Components\TextArea::make('observaciones')
                    ->maxLength(255)
                    ->columnSpan('full'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('persona.cedula')
                    ->label('Cédula')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('persona.primer_nombre')
                    ->label('Nombre')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('persona.primer_apellido')
                    ->label('Apellido')
                    ->numeric()
                    ->searchable()
                    ->sortable(),

                    Tables\Columns\TextColumn::make('tipoBeneficio.tipo_beneficio')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('beneficio.beneficio')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cantidad')
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
