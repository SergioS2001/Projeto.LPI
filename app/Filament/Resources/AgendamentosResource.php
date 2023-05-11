<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgendamentosResource\Pages;
use App\Filament\Resources\AgendamentosResource\RelationManagers;
use App\Filament\Resources\AgendamentosResource\RelationManagers\TipoAgendamentoRelationManager;
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

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                TextInput::make('nome')->required()
                ->label('Nome'),
                TextInput::make('descrição')->required()
                ->label('Descrição'),
                DatePicker::make('Data')
                ->minDate(now())
                ->required(),
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
                TextColumn::make('id')->sortable()->searchable()->label('id'),
                TextColumn::make('users.name')->sortable()->searchable()->label('Users'),
                TextColumn::make('nome')->sortable()->searchable()->label('Nome'),
                TextColumn::make('descrição')->sortable()->searchable()->label('Descrição'),
                TextColumn::make('data')->date()->sortable()->searchable(),
                TextColumn::make('duração')->sortable()->searchable()->label('Duração'),
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
    return ['nome','descrição','users.name','data','hora'];
}

}
