<?php

namespace App\Filament\Analista\Resources;

use App\Filament\Analista\Resources\PersonaResource\Pages;
use App\Filament\Analista\Resources\PersonaResource\RelationManagers;
use App\Models\Persona;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class PersonaResource extends Resource
{
    protected static ?string $model = Persona::class;

    protected static ?string $navigationIcon = 'heroicon-s-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('tipo_identificacion_id')
                    ->relationship('tipoIdentificacion', 'id')
                    ->required(),
                Forms\Components\TextInput::make('cedula')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('primer_nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('segundo_nombre')
                    ->maxLength(255),
                Forms\Components\TextInput::make('primer_apellido')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('segundo_apellido')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('telefono')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('celular')
                    ->maxLength(255),
                Forms\Components\Select::make('genero_id')
                    ->relationship('genero', 'id')
                    ->required(),
                Forms\Components\DatePicker::make('fecha_nacimiento')
                    ->required(),
                Forms\Components\Select::make('pueblo_id')
                    ->relationship('pueblo', 'id')
                    ->required(),
                Forms\Components\Select::make('estado_civil_id')
                    ->relationship('estadoCivil', 'id')
                    ->required(),
                Forms\Components\Select::make('estado_id')
                    ->relationship('estado', 'id')
                    ->required(),
                Forms\Components\Select::make('municipio_id')
                    ->relationship('municipio', 'id')
                    ->required(),
                Forms\Components\Select::make('parroquia_id')
                    ->relationship('parroquia', 'id')
                    ->required(),
                Forms\Components\Select::make('comunidad_id')
                    ->relationship('comunidad', 'id')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tipo_identificacion.tipo_identificacion')
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
                Tables\Columns\TextColumn::make('estado.estado')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('municipio.municipio')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('parroquia.parroquia')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('comunidad.comunidad')
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
