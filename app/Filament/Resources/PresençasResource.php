<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PresençasResource\Pages;
use App\Filament\Resources\PresençasResource\RelationManagers;
use App\Models\Presenças;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
class PresençasResource extends Resource
{
    protected static ?string $model = Presenças::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Orientação';

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
                TextColumn::make('user.name')->sortable()->searchable()->limit(12)->label('Aluno'),
                TextColumn::make('estagio.nome')->sortable()->searchable()->limit(12)->label('Estágio'),
                TextColumn::make('')->sortable()->searchable()->limit(12)->label('Orientador'),
                IconColumn::make('isValidated')->sortable()->searchable()->label('Presença Validada')->boolean(),
                TextColumn::make('data')->date()->sortable()->searchable(),
                TextColumn::make('h_entrada')->sortable()->label('Entrada(h)'),
                TextColumn::make('h_pausa')->sortable()->label('Tempo Pausa'),
                TextColumn::make('h_saida')->sortable()->label('Saída(h)'),
                TextColumn::make('horas_mes')->sortable()->label('Horas Mês'),
                TextColumn::make('total_horas')->sortable()->label('Total Horas'),
                TextColumn::make('count_presenças')->sortable()->label('Número Presenças'),
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
            'index' => Pages\ListPresenças::route('/'),
            'create' => Pages\CreatePresenças::route('/create'),
            'edit' => Pages\EditPresenças::route('/{record}/edit'),
        ];
    }    
}
