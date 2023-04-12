<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AvaliaçõesResource\Pages;
use App\Filament\Resources\AvaliaçõesResource\RelationManagers;
use App\Models\Avaliações;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use App\Models\Estágios;
use App\Models\User;


class AvaliaçõesResource extends Resource
{
    protected static ?string $model = Avaliações::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Orientação';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('users.name')->sortable()->searchable()->limit(12)->label('Aluno'),
                TextColumn::make('estágios.nome')->sortable()->searchable()->label('Estágio'),
                TextColumn::make('Orientador')->sortable()->searchable()->label('Orientadores'),
                TextColumn::make('nota')->sortable()->label('Nota Final'),
                IconColumn::make('isDone')->label('Concluído')->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListAvaliações::route('/'),
            'create' => Pages\CreateAvaliações::route('/create'),
            'edit' => Pages\EditAvaliações::route('/{record}/edit'),
        ];
    }    
}
