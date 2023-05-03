<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CursoEstagioResource\Pages;
use App\Filament\Resources\CursoEstagioResource\RelationManagers;
use App\Models\Curso_Estagio;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Card;
class CursoEstagioResource extends Resource
{
    protected static ?string $model = Curso_Estagio::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Estágios/Ensinos Clínicos';

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
                TextColumn::make('id')->sortable()->searchable()->label('id'),
                TextColumn::make('curso')->sortable()->searchable()->limit(25)->label('Curso'),
                TextColumn::make('ects')->sortable()->searchable()->label('ECTS'),
                TextColumn::make('estágios.nome')->sortable()->searchable()->limit(12)->label('Estágio'),
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
            'index' => Pages\ListCursoEstagios::route('/'),
            'create' => Pages\CreateCursoEstagio::route('/create'),
            'edit' => Pages\EditCursoEstagio::route('/{record}/edit'),
        ];
    }    
}