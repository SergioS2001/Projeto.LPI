<?php

namespace App\Filament\Resources\AgendamentosResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
class TipoAgendamentoRelationManager extends RelationManager
{
    protected static string $relationship = 'tipo_agendamento';

    protected static ?string $recordTitleAttribute = 'tipo';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                TextInput::make('nome_evento')->required()
                ->label('Tipo Agendamento'),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->searchable()->label('id'),
                TextColumn::make('nome_evento')->sortable()->searchable()->label('Tipo'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
