<?php

namespace App\Filament\Director\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Persona;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Comunidad;
use App\Models\Municipio;
use App\Models\Parroquia;
use Filament\Tables\Table;
use App\Models\TipoBeneficio;
use Filament\Resources\Resource;
use App\Models\TipoIdentificacion;
use Illuminate\Support\Collection;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Filament\Resources\PersonaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PersonaResource\RelationManagers;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class PersonaResource extends Resource
{
    protected static ?string $model = Persona::class;

    protected static ?string $navigationIcon = 'heroicon-s-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Datos Personales')
                    ->schema([
                        Forms\Components\Select::make('tipo_identificacion_id')
                        ->label('Tipo de identificación')
                        ->relationship('tipoIdentificacion', 'tipo_identificacion')
                        ->searchable()
                        ->default(1)
                        ->preload()
                        ->live()
                        ->required(),
                        Forms\Components\TextInput::make('cedula')
                            ->maxLength(8)
                            ->minLength(8)
                            ->mask('99999999')
                            ->numeric()
                            ->required()
                            ->label('Cédula'),
                        Forms\Components\TextInput::make('primer_nombre')
                            ->required()
                            ->autocapitalize()
                            ->minLength(2)
                            ->maxLength(20),
                        Forms\Components\TextInput::make('segundo_nombre')
                            ->minLength(2)
                            ->maxLength(20)
                            ->autocapitalize(),
                        Forms\Components\TextInput::make('primer_apellido')
                            ->required()
                            ->minLength(4)
                            ->maxLength(20)
                            ->autocapitalize(),
                        Forms\Components\TextInput::make('segundo_apellido')
                            ->maxLength(20)
                            ->minLength(4)
                            ->autocapitalize(),
                            Forms\Components\Select::make('pueblo_id')
                            ->relationship('pueblo', 'pueblo')
                            ->searchable()
                            ->preload()
                            ->live()
                            ->required(),
                         Forms\Components\Select::make('genero_id')
                            ->relationship('genero', 'genero')
                            ->searchable()
                            ->preload()
                            ->live()
                            ->required(),
                        Forms\Components\DatePicker::make('fecha_nacimiento')
                            ->required(),
                            Forms\Components\Select::make('estado_civil_id')
                            ->relationship('estadoCivil', 'estado_civil')
                            ->searchable()
                            ->preload()
                            ->live()
                            ->required(),

                    ]),

                Fieldset::make('Contacto')
                    ->schema([
                        Forms\Components\TextInput::make('email')
                            ->unique()
                            ->placeholder('example@gmail.com')
                            ->email()
                            ->maxLength(50),
                        Forms\Components\TextInput::make('telefono')
                            ->mask('99999999999')
                            ->numeric()
                            ->tel()
                            ->maxLength(11),
                        Forms\Components\TextInput::make('celular')
                            ->numeric()
                            ->mask('99999999999')
                            ->maxLength(11),

                    ]),

                Fieldset::make('Dirección')
                    ->schema([
                        Forms\Components\Select::make('estado_id')
                            ->relationship('estado', 'estado')
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

                        Forms\Components\Select::make('comunidad_id')
                            ->label('Comunidad')
                            ->options(fn(Get $get): Collection => Comunidad::query()
                                ->where('parroquia_id', $get('parroquia_id'))
                                ->pluck('comunidad', 'id'))
                            ->searchable()
                            ->preload()
                            ->live()
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tipo_identificacion')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cedula')
                    ->searchable(),
                Tables\Columns\TextColumn::make('primer_nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('segundo_nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('primer_apellido')
                    ->searchable(),
                Tables\Columns\TextColumn::make('segundo_apellido')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('telefono')
                    ->searchable(),
                Tables\Columns\TextColumn::make('celular')
                    ->searchable(),
                Tables\Columns\TextColumn::make('genero.genero')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_nacimiento')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pueblo.pueblo')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estado_civil.estado_civil')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('comunidad.comunidad')
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
            'index' => Pages\ManagePersonas::route('/'),
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
