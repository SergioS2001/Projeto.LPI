<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AvaliaçõesResource\Pages;
use App\Filament\Resources\AvaliaçõesResource\RelationManagers;
use App\Models\Avaliações;
use App\Models\Estágios;
use App\Models\Orientadores;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class AvaliaçõesResource extends Resource
{
    protected static ?string $model = Avaliações::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Orientação';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                Select::make('estagio.nome')
                ->label('Estágio')
                ->options(Estágios::all()->pluck('nome', 'id'))
                ->required()
                ->searchable(),
                Select::make('orientador.users.name')
                ->label('Orientador')
                ->options(Orientadores::all()->pluck('users_id', 'name'))
                ->required()
                ->searchable(),
                TextInput::make('nota')
                ->required()
                ->label('Nota final')
                ->numeric()
                ->minValue(1)
                ->maxValue(20),
                Checkbox::make('isDone')
                ->required()
                ->label('Concluído'),
                Checkbox::make('fileSubmitted')
                ->label('Relatório final enviado'),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('users.name')->sortable()->searchable()->limit(12)->label('Aluno'),
                TextColumn::make('estagio.nome')->sortable()->searchable()->label('Estágio'),
                TextColumn::make('orientador.users.name')->sortable()->searchable()->label('Orientadores'),
                TextColumn::make('nota')->sortable()->label('Nota Final'),
                IconColumn::make('isDone')->label('Concluído')->boolean(),
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
            'index' => Pages\ListAvaliações::route('/'),
            'create' => Pages\CreateAvaliações::route('/create'),
            'edit' => Pages\EditAvaliações::route('/{record}/edit'),
        ];
    }    
}
