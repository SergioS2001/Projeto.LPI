<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CauçõesResource\Pages;
use App\Filament\Resources\CauçõesResource\RelationManagers;
use App\Models\Cauções;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CauçõesResource extends Resource
{
    protected static ?string $model = Cauções::class;

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
            'index' => Pages\ListCauções::route('/'),
            'create' => Pages\CreateCauções::route('/create'),
            'edit' => Pages\EditCauções::route('/{record}/edit'),
        ];
    }    
}
