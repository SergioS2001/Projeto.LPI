<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactosEmergênciaResource\Pages;
use App\Filament\Resources\ContactosEmergênciaResource\RelationManagers;
use App\Models\Contactos_Emergência;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactosEmergênciaResource extends Resource
{
    protected static ?string $model = Contactos_Emergência::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Utilizadores';

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
                TextColumn::make('users.name')->sortable()->searchable()->label("Aluno"),
                TextColumn::make('telemóvel')->sortable()->searchable()->label("Contacto Emergência"),
                TextColumn::make('nome')->sortable()->searchable()->label("Nome contacto"),
                TextColumn::make('grau_parentesco')->sortable()->searchable()->label("Grau Parentesco"),
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
            'index' => Pages\ListContactosEmergências::route('/'),
            'create' => Pages\CreateContactosEmergência::route('/create'),
            'edit' => Pages\EditContactosEmergência::route('/{record}/edit'),
        ];
    }    
}
