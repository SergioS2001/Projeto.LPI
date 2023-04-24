<?php

namespace App\Filament\Resources\CacifosResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CauçõesRelationManager extends RelationManager
{
    protected static string $relationship = 'cauções';

    protected static ?string $recordTitleAttribute = 'caução';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('valor')
                ->required()
                ->label('Valor'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('cacifos.numero')->sortable()->searchable()->limit(12)->label('Numero Cacifo'),
                TextColumn::make('valor')->sortable()->searchable()->label('Montante'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
