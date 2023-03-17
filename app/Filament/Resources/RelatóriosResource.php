<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RelatóriosResource\Pages;
use App\Filament\Resources\RelatóriosResource\RelationManagers;
use App\Models\Relatórios;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RelatóriosResource extends Resource
{
    protected static ?string $model = Relatórios::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Documentos';

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
                //
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
            'index' => Pages\ListRelatórios::route('/'),
            'create' => Pages\CreateRelatórios::route('/create'),
            'edit' => Pages\EditRelatórios::route('/{record}/edit'),
        ];
    }    
}
