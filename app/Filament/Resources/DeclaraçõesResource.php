<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeclaraçõesResource\Pages;
use App\Filament\Resources\DeclaraçõesResource\RelationManagers;
use App\Models\Declarações;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DeclaraçõesResource extends Resource
{
    protected static ?string $model = Declarações::class;

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
            'index' => Pages\ListDeclarações::route('/'),
            'create' => Pages\CreateDeclarações::route('/create'),
            'edit' => Pages\EditDeclarações::route('/{record}/edit'),
        ];
    }    
}
