<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactosEmergênciaResource\Pages;
use App\Filament\Resources\ContactosEmergênciaResource\RelationManagers;
use App\Models\Contactos_Emergência;
use App\Models\User as ModelsUser;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\User;

class ContactosEmergênciaResource extends Resource
{
    protected static ?string $model = Contactos_Emergência::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Utilizadores';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                Select::make('users_id')
                ->required()
                ->label('Aluno')
                ->options(User::all()->pluck('name', 'id'))
                ->searchable(),
                TextInput::make('nome')
                ->required()
                ->label('Nome'),
                TextInput::make('telemóvel')
                ->required()
                ->label('Telemóvel'),
                TextInput::make('grau_parentesco')
                ->required()
                ->label('Grau de Parentesco'),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->sortable()->searchable()->label("Aluno"),
                TextColumn::make('telemóvel')->sortable()->searchable()->label("Contacto Emergência"),
                TextColumn::make('nome')->sortable()->searchable()->label("Nome contacto"),
                TextColumn::make('grau_parentesco')->sortable()->searchable()->label("Grau Parentesco"),
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
            'index' => Pages\ListContactosEmergências::route('/'),
            'create' => Pages\CreateContactosEmergência::route('/create'),
            'edit' => Pages\EditContactosEmergência::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['telemóvel', 'grau_parentesco'];
    }
}
