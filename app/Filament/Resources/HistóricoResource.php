<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HistóricoResource\Pages;
use App\Filament\Resources\HistóricoResource\RelationManagers;
use App\Models\Histórico;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class HistóricoResource extends Resource
{
    protected static ?string $model = Histórico::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Estágios/Ensinos Clínicos';

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
                TextColumn::make('')->sortable()->searchable()->label('Data'),
                TextColumn::make('')->sortable()->limit(9)->label('Cacifo'),
                TextColumn::make('')->sortable()->label('Valor Caução'),
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
            'index' => Pages\ListHistórico::route('/'),
            'create' => Pages\CreateHistórico::route('/create'),
            'edit' => Pages\EditHistórico::route('/{record}/edit'),
        ];
    }    
}
