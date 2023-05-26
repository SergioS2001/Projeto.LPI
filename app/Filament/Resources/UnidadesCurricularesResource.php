<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UnidadesCurricularesResource\Pages;
use App\Filament\Resources\UnidadesCurricularesResource\RelationManagers;
use App\Filament\Resources\UnidadesCurricularesResource\Widgets\UnidadesCurricularesStatsOverview;
use App\Models\Unidades_Curriculares;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UnidadesCurricularesResource extends Resource
{
    protected static ?string $model = Unidades_Curriculares::class;
    protected static ?string $recordTitleAttribute = 'nome';
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Recursos Estágios/EC';
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                TextInput::make('nome')->required()
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
            UnidadesCurricularesStatsOverview::class,
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
