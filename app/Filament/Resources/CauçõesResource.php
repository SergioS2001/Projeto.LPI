<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CauçõesResource\Pages;
use App\Filament\Resources\CauçõesResource\RelationManagers;
use App\Models\Cacifos;
use App\Models\Cauções;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class CauçõesResource extends Resource
{
    protected static ?string $model = Cauções::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                TextInput::make('valor')->required()
                ->label('Valor'),
                TextInput::make('descrição')->required()
                ->label('Descrição'),
                TextInput::make('duração')->required()
                ->label('Duração')
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
                TextColumn::make('cacifos.numero')->sortable()->searchable()->limit(12)->label('Numero Cacifo'),
                TextColumn::make('valor')->sortable()->searchable()->label('Montante'),
                IconColumn::make('isPago')->label('Pagamento')->boolean(),
                IconColumn::make('isDevolvido')->label('Reembolso')->boolean(),
                TextColumn::make('users.name')->sortable()->searchable()->limit(12)->label('Aluno'),
                TextColumn::make('estágios.nome')->sortable()->searchable()->limit(12)->label('Estágio'),
                IconColumn::make('isAssinadoAluno')->label('Papel assinado')->boolean(),
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
            'index' => Pages\ListCauções::route('/'),
            'create' => Pages\CreateCauções::route('/create'),
            'edit' => Pages\EditCauções::route('/{record}/edit'),
        ];
    }    
}
