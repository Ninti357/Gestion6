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
                Forms\Components\DatePicker::make('fecha_de_nacimiento')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
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
                Tables\Columns\TextColumn::make('fecha_de_nacimiento')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
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
            'index' => Pages\ManageRegistros::route('/'),
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
