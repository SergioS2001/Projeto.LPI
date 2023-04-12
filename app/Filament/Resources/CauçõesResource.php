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
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
class CauçõesResource extends Resource
{
    protected static ?string $model = Cauções::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
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
                TextColumn::make('estágios.nome')->sortable()->searchable()->limit(12)->label('Estágio'),
                TextColumn::make('cacifos.numero')->sortable()->searchable()->limit(12)->label('Cacifo'),
                TextColumn::make('valor')->sortable()->searchable()->label('Montante'),
                IconColumn::make('isPago')->label('Pagamento')->boolean(),
                IconColumn::make('isDevolvido')->label('Reembolso')->boolean(),
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
