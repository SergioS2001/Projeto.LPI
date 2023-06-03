<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CacifosResource\Pages;
use App\Filament\Resources\CacifosResource\RelationManagers;
use App\Filament\Resources\CacifosResource\RelationManagers\CauçõesRelationManager;
use App\Filament\Resources\CacifosResource\Widgets\CacifosStatsOverview;
use App\Models\Cacifos_Estágios;
use App\Models\Cacifos;
use App\Models\Cauções;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
class CacifosResource extends Resource
{
    protected static ?string $model = Cacifos::class;
    protected static ?string $recordTitleAttribute = 'numero';
    protected static ?string $navigationGroup = 'Cacifos';
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                TextInput::make('numero')
                ->required()
                ->label('Numero Cacifo'),
                Select::make('cauções_id')
                ->label('Caução')
                ->options(Cauções::all()->pluck('valor', 'id'))
                ->required()
                ->searchable(),
                Checkbox::make('chave_partilhada')
                //->required()
                ->label('Chave cacifo partilhada?'),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('numero')->sortable()->label('Cacifo'),
                TextColumn::make('data_inicio')->sortable()->label('Data de inicio'),
                IconColumn::make('chave_partilhada')->label('Chave partilhada')->boolean(),
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
            CacifosStatsOverview::class,
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
