<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InstituiçõesResource\Pages;
use App\Filament\Resources\InstituiçõesResource\RelationManagers;
use App\Filament\Resources\InstituiçõesResource\Widgets\InstituicaoEstagioStatsOverview;
use App\Models\Estágios;
use App\Models\Instituição_Estágio;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Card;

class InstituiçõesResource extends Resource
{
    protected static ?string $model = Instituição_Estágio::class;
    protected static ?string $recordTitleAttribute = 'nome';

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Estágios/Ensinos Clínicos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('nome')->required()
                    ->label('Instituição'),
                    TextInput::make('sigla')->required()
                    ->label('Sigla'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //TextColumn::make('id')->sortable()->searchable()->label('id'),
                TextColumn::make('nome')->sortable()->searchable()->limit(25)->label('Instituição'),
                TextColumn::make('sigla')->sortable()->searchable()->label('Sigla'),
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
            InstituicaoEstagioStatsOverview::class,
        ];
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInstituições::route('/'),
            'create' => Pages\CreateInstituições::route('/create'),
            'edit' => Pages\EditInstituições::route('/{record}/edit'),
        ];
    }    
}
