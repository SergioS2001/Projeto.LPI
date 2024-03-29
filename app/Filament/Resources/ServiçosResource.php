<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiçosResource\Pages;
use App\Filament\Resources\ServiçosResource\RelationManagers;
use App\Filament\Resources\ServiçosResource\Widgets\ServiçosStatsOverview;
use App\Models\Estágios;
use App\Models\Serviços;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class ServiçosResource extends Resource
{
    protected static ?string $model = Serviços::class;
    protected static ?string $recordTitleAttribute = 'titulo';
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Recursos Estágios/EC';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('titulo')->required()
                    ->label('Serviços'),
                    TextInput::make('nome_responsavel')->required()
                    ->label('Nome Responsável'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titulo')->sortable()->searchable()->limit(30)->label('Serviço'),
                TextColumn::make('nome_responsavel')->sortable()->searchable()->label('Responsável'),
                ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                \Filament\Tables\Actions\DeleteAction::make(),
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
            ServiçosStatsOverview::class,
        ];
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServiços::route('/'),
            'create' => Pages\CreateServiços::route('/create'),
            'edit' => Pages\EditServiços::route('/{record}/edit'),
        ];
    }    
}
