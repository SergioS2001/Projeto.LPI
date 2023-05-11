<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrientaçãoEstagiosResource\Pages;
use App\Filament\Resources\OrientaçãoEstagiosResource\RelationManagers;
use App\Models\Orientação_Estagios;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrientaçãoEstagiosResource extends Resource
{
    protected static ?string $model = Orientação_Estagios::class;

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
                TextColumn::make('user.name')->sortable()->searchable()->label('Aluno'),
                TextColumn::make('estágios.nome')->sortable()->searchable()->label('Estágio'),
                TextColumn::make('orientador.users.name')->sortable()->searchable()->label('Orientador'),
                TextColumn::make('horario_apresentacao')->sortable()->searchable()->label('Apresentação 1º dia'),

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
            'index' => Pages\ListOrientaçãoEstagios::route('/'),
            'create' => Pages\CreateOrientaçãoEstagios::route('/create'),
            'edit' => Pages\EditOrientaçãoEstagios::route('/{record}/edit'),
        ];
    }    
}
