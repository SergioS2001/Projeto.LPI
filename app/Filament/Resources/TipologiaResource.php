<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TipologiaResource\Pages;
use App\Filament\Resources\TipologiaResource\RelationManagers;
use App\Filament\Resources\TipologiaResource\Widgets\TipologiasStatsOverview;
use App\Models\Tipologia_Estágio;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Card;

class TipologiaResource extends Resource
{
    protected static ?string $model = Tipologia_Estágio::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Estágios/Ensinos Clínicos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('titulo')->required()
                    ->label('Tipologia'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->searchable()->limit(12)->label('id'),
                TextColumn::make('titulo')->sortable()->searchable()->limit(25)->label('Tipologia'),
                //TextColumn::make('estagio.nome')->sortable()->searchable()->limit(12)->label('Estágio'),
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
    
    public static function  getWidgets(): array
    {
        return [
            TipologiasStatsOverview::class,
        ];
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTipologias::route('/'),
            'create' => Pages\CreateTipologia::route('/create'),
            'edit' => Pages\EditTipologia::route('/{record}/edit'),
        ];
    }    
}
