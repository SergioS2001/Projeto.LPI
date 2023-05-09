<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CacifoEstagioResource\Pages;
use App\Filament\Resources\CacifoEstagioResource\RelationManagers;
use App\Filament\Resources\CacifoEstagioResource\Widgets\CacifoEstagioStatsOverview;
use App\Models\Cacifo_Estagio;
use App\Models\Cacifos;
use App\Models\Estágios;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CacifoEstagioResource extends Resource
{
    protected static ?string $model = Cacifo_Estagio::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static $routeName = 'cacifo-estagios';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Select::make('users_id')
                    ->label('Aluno')
                    ->options(User::all()->pluck('name', 'id'))
                    ->required()
                    ->searchable(),
                    Select::make('estágios_id')
                    ->label('Estágio')
                    ->options(Estágios::all()->pluck('nome', 'id'))
                    ->required()
                    ->searchable(),
                    Select::make('cacifos_id')
                    ->label('Cacifo')
                    ->options(Cacifos::all()->pluck('numero', 'id'))
                    ->searchable(),
                    Checkbox::make('fardamento')
                    ->label('Fardamento?'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('users.name')->sortable()->label('Aluno'),
                TextColumn::make('estágios.nome')->sortable()->label('Estágio'),
                TextColumn::make('cacifos.numero')->sortable()->label('Cacifo'),
                TextColumn::make('cauções.id')->sortable()->label('Número Caução'),
                IconColumn::make('fardamento')->label('Fardamento necessário')->boolean(),
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
            CacifoEstagioStatsOverview::class,
        ];
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCacifoEstagios::route('/'),
            'create' => Pages\CreateCacifoEstagio::route('/create'),
            'edit' => Pages\EditCacifoEstagio::route('/{record}/edit'),
        ];
    }    
}
