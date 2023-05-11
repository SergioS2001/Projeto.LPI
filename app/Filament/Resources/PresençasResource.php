<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PresençasResource\Pages;
use App\Filament\Resources\PresençasResource\RelationManagers;
use App\Filament\Resources\PresençasResource\Widgets\PresençasStatsOverview;
use App\Models\Estágios;
use App\Models\Presenças;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class PresençasResource extends Resource
{
    protected static ?string $model = Presenças::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Acompanhamento Estágio/EC';
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                DatePicker::make('data')
                ->label("Data")
                ->minDate(now())
                ->required(),
                TextInput::make('h_entrada')
                ->required()
                ->label('Hora entrada')
                ->numeric()
                ->minValue(1)
                ->maxValue(24),
                TextInput::make('h_saida')
                ->required()
                ->label('Hora saida')
                ->numeric()
                ->minValue(1)
                ->maxValue(24),
                TextInput::make('tempo_pausa')
                ->required()
                ->label('Tempo de pausa')
                ->numeric()
                ->minValue(1)
                ->maxValue(5),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('orientação_estagios.estágios.nome')->sortable()->searchable()->limit(12)->label('Estágio'),
                TextColumn::make('orientação_estagios.user.name')->sortable()->searchable()->limit(12)->label('Aluno'),
                TextColumn::make('data')->date()->sortable()->searchable(),
                TextColumn::make('h_entrada')->sortable()->label('Entrada(h)'),
                TextColumn::make('tempo_pausa')->sortable()->label('Pausa(min)'),
                TextColumn::make('h_saida')->sortable()->label('Saída(h)'),
                IconColumn::make('isValidated')->sortable()->searchable()->label('Presença Validada')->boolean(),
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
            PresençasStatsOverview::class,
        ];
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPresenças::route('/'),
            'create' => Pages\CreatePresenças::route('/create'),
            'edit' => Pages\EditPresenças::route('/{record}/edit'),
        ];
    }
    public static function getGloballySearchableAttributes(): array
    {
        return ['orientação_estagios.estágios.nome', 'orientação_estagios.user.name','orientação_estagios.orientador.users.name','data','h_entrada','h_saida'];
    }

}
