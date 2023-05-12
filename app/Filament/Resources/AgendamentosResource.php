<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgendamentosResource\Pages;
use App\Filament\Resources\AgendamentosResource\RelationManagers;
use App\Models\Agendamentos;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AgendamentosResource extends Resource
{
    protected static ?string $model = Agendamentos::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Calendário';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome')->sortable()->searchable()->label('Nome'),
                TextColumn::make('descrição')->sortable()->searchable()->label('Descrição'),
                TextColumn::make('data')->date()->sortable()->searchable()->label('Data'),
                TextColumn::make('hora')->sortable()->searchable()->label('Hora'),
                TextColumn::make('duração')->sortable()->searchable()->label('Duração(min)'),
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
        return ['nome', 'descrição','data','hora','duração'];
    }

}
