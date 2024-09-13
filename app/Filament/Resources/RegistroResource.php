<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegistroResource\Pages;
use App\Filament\Resources\RegistroResource\RelationManagers;
use App\Models\Registro;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegistroResource extends Resource
{
    protected static ?string $model = Registro::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                   Forms\Components\TextInput::make('cedula')->required(),
                   Forms\Components\TextInput::make('primer_nombre'),
                   Forms\Components\TextInput::make('segundo_nombre'),
                   Forms\Components\TextInput::make('primer_apellido'),
                   Forms\Components\TextInput::make('segundo_apellido'),
                   Forms\Components\DatePicker::make('fecha_de_nacimiento')->required(),
                   Forms\Components\TextInput::make('email')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRegistros::route('/'),
            'create' => Pages\CreateRegistro::route('/create'),
            'edit' => Pages\EditRegistro::route('/{record}/edit'),
        ];
    }
}
