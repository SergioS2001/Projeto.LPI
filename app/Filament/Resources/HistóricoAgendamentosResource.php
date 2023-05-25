<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HistóricoAgendamentosResource\Pages;
use App\Filament\Resources\HistóricoAgendamentosResource\RelationManagers;
use App\Models\Histórico_Agendamentos;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HistóricoAgendamentosResource extends Resource
{
    protected static ?string $model = Histórico_Agendamentos::class;
    protected static ?string $navigationGroup = 'Calendário';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                TextInput::make('agendamentos.nome')->required()
                ->label('Nome'),
                TextInput::make('agendamentos.descrição')->required()
                ->label('Descrição'),
                DatePicker::make('agendamentos.data')
                ->minDate(now())
                ->label('Data')
                ->required(),
                TextInput::make('agendamentos.hora')->required()
                ->label('Hora')
                ->numeric()
                ->minValue(1)
                ->maxValue(24),
                TextInput::make('agendamentos.duração')->required()
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
                TextColumn::make('orientação_estagios.users.name')->sortable()->searchable()->label('Utilizador'),
                 TextColumn::make('agendamentos.nome')->sortable()->searchable()->label('Agendamentos'),
                 TextColumn::make('agendamentos.data')->sortable()->searchable()->label('Data'),
                 TextColumn::make('agendamentos.hora')->sortable()->searchable()->label('Hora'),
                 TextColumn::make('agendamentos.duração')->sortable()->searchable()->label('Duração(min)'),
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
            'index' => Pages\ListHistóricoAgendamentos::route('/'),
            'create' => Pages\CreateHistóricoAgendamentos::route('/create'),
            'edit' => Pages\EditHistóricoAgendamentos::route('/{record}/edit'),
        ];
    }    
}
