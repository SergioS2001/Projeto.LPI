<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HistóricoAgendamentosResource\Pages;
use App\Filament\Resources\HistóricoAgendamentosResource\RelationManagers;
use App\Models\Agendamentos;
use App\Models\Histórico_Agendamentos;
use App\Models\Orientação_Estagios;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
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
                Select::make('nome')
                ->label('Estágio')
                ->searchable()
                ->options(function () {
                    return Orientação_Estagios::join('estágios', 'orientação_estagios.estágios_id', '=', 'estágios.id')
                    ->pluck('estágios.nome', 'orientação_estagios.estágios_id');
                }),
                Select::make('name')
                ->label('Aluno')
                ->searchable()
                ->options(function () {
                    return Orientação_Estagios::join('users', 'orientação_estagios.users_id', '=', 'users.id')
                    ->pluck('users.name', 'orientação_estagios.users_id');
                }),
                Select::make('agendamentos_nome')
                ->label('Agendamento')
                ->searchable()
                ->options(function () {
                    return Agendamentos::pluck('nome', 'id');
                }),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('orientação_estagios.users.name')->sortable()->searchable()->label('Aluno'),
                TextColumn::make('orientação_estagios.estágios.nome')->sortable()->searchable()->label('Estágio'),
                TextColumn::make('orientação_estagios.orientador.users.name')->sortable()->searchable()->label('Orientador'),
                 TextColumn::make('agendamentos.nome')->sortable()->searchable()->label('Agendamento'),
                 TextColumn::make('agendamentos.data')->sortable()->searchable()->label('Data'),
                 TextColumn::make('agendamentos.hora')->sortable()->searchable()->label('Hora Inicio'),
                 TextColumn::make('agendamentos.hora_fim')->sortable()->searchable()->label('Hora Fim'),
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
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHistóricoAgendamentos::route('/'),
            'create' => Pages\CreateHistóricoAgendamentos::route('/create'),
            'edit' => Pages\EditHistóricoAgendamentos::route('/{record}/edit'),
        ];
    }    
}
