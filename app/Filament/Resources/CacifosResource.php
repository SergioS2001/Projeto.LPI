<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CacifosResource\Pages;
use App\Filament\Resources\CacifosResource\RelationManagers;
use App\Filament\Resources\CacifosResource\RelationManagers\CauçõesRelationManager;
use App\Filament\Resources\CacifosResource\Widgets\CacifosStatsOverview;
use App\Models\Cacifo_Estagio;
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
                Checkbox::make('cacifo_estagio.fardamento')
                //->required()
                ->label('Fardamento?'),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('numero')->sortable()->label('Cacifo'),
                TextColumn::make('cauções.valor')->sortable()->label('Valor Caução'),
                IconColumn::make('chave_partilhada')->label('Chave partilhada')->boolean(),
                TextColumn::make('users.name')->sortable()->searchable()->limit(12)->label('Aluno'),
                TextColumn::make('estágios.nome')->sortable()->searchable()->label('Estágio'),
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
            CauçõesRelationManager::class
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
