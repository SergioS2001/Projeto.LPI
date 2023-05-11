<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgendamentosResource\Pages;
use App\Filament\Resources\AgendamentosResource\RelationManagers;
use App\Models\Agendamentos;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class AgendamentosResource extends Resource
{
    protected static ?string $model = Agendamentos::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Calendário';
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                TextInput::make('evento.nome')->required()
                ->label('Nome'),
                TextInput::make('evento.descrição')->required()
                ->label('Descrição'),
                DatePicker::make('evento.data')
                ->minDate(now())
                ->label('Data')
                ->required(),
                TextInput::make('evento.duração')->required()
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
                //TextColumn::make('id')->sortable()->searchable()->label('id'),
                TextColumn::make('evento.nome')->sortable()->searchable()->label('Evento'),
                TextColumn::make('users.name')->sortable()->searchable()->label('Utilizador'),
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
            'index' => Pages\ListAgendamentos::route('/'),
            'create' => Pages\CreateAgendamentos::route('/create'),
            'edit' => Pages\EditAgendamentos::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
{
    return ['evento.nome','evento.descrição','users.name','evento.data','evento.hora'];
}

}
