<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CursosEstágiosResource\Pages;
use App\Filament\Resources\CursosEstágiosResource\RelationManagers;
use App\Filament\Resources\CursosEstágiosResource\Widgets\CursosEstágiosStatsOverview ;
use App\Models\Cursos_Estágios;
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

class CursosEstágiosResource extends Resource
{
    protected static ?string $model = Cursos_Estágios::class;
    protected static ?string $recordTitleAttribute = 'curso';
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Recursos Estágios/EC';
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                TextInput::make('curso')->required()
                ->label('Curso'),
                TextInput::make('ects')->required()
                ->label('ECTS'),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('curso')->sortable()->searchable()->limit(25)->label('Curso'),
                TextColumn::make('ects')->sortable()->searchable()->label('ECTS'),
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
            CursosEstágiosStatsOverview ::class,
        ];
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCursosEstágios::route('/'),
            'create' => Pages\CreateCursosEstágios::route('/create'),
            'edit' => Pages\EditCursosEstágios::route('/{record}/edit'),
        ];
    }
}
