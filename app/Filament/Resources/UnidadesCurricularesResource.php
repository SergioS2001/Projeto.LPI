<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UnidadesCurricularesResource\Pages;
use App\Filament\Resources\UnidadesCurricularesResource\RelationManagers;
use App\Models\Estágios;
use App\Models\Unidade_Curricular;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Card;

class UnidadesCurricularesResource extends Resource
{
    protected static ?string $model = Unidade_Curricular::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Estágios/Ensinos Clínicos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Select::make('estagios_id')
                    ->label('Selecionar Estágio')
                    ->options(Estágios::all()->pluck('nome', 'id'))
                    ->searchable(),
                    TextInput::make('unidade_curricular_id')->required()
                    ->label('Unidade Curricular'),
                    ])
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
