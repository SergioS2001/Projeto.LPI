<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UnidadesCurricularesResource\Pages;
use App\Filament\Resources\UnidadesCurricularesResource\RelationManagers;
use App\Models\Unidade_Curricular;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
class UnidadesCurricularesResource extends Resource
{
    protected static ?string $model = Unidade_Curricular::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Estágios/Ensinos Clínicos';

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
                TextColumn::make('id')->sortable()->searchable()->limit(12)->label('id'),
                TextColumn::make('nome')->sortable()->searchable()->label('Unidade Curricular'),
                TextColumn::make('estágios.unidade_curricular_id.nome')->sortable()->searchable()->label('Estágio'),
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
            'index' => Pages\ListUnidadesCurriculares::route('/'),
            'create' => Pages\CreateUnidadesCurriculares::route('/create'),
            'edit' => Pages\EditUnidadesCurriculares::route('/{record}/edit'),
        ];
    }    
}
