<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CacifosResource\Pages;
use App\Filament\Resources\CacifosResource\RelationManagers;
use App\Models\Cacifos;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;

class CacifosResource extends Resource
{
    protected static ?string $model = Cacifos::class;

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
                TextColumn::make('estágios.nome')->sortable()->searchable()->label('Estágio'),
                TextColumn::make('numero')->sortable()->limit(9)->label('Cacifo'),
                TextColumn::make('cauções_id.valor')->sortable()->label('Valor Caução'),
                IconColumn::make('cauções_id.isPago')->label('Pagamento')->boolean(),
                IconColumn::make('cauções_id.isDevolvido')->label('Reembolso')->boolean(),
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
            'index' => Pages\ListCacifos::route('/'),
            'create' => Pages\CreateCacifos::route('/create'),
            'edit' => Pages\EditCacifos::route('/{record}/edit'),
        ];
    }    
}
