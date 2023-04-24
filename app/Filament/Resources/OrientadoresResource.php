<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrientadoresResource\Pages;
use App\Filament\Resources\OrientadoresResource\RelationManagers;
use App\Models\Orientadores;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Card;

class OrientadoresResource extends Resource
{
    protected static ?string $model = Orientadores::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Utilizadores';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Select::make('users.name')
                    ->label('Utilizadores')
                    ->options(Orientadores::all()->pluck('name', 'id'))
                    ->searchable(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->label('id Orientador'),
                TextColumn::make('users.name')->sortable()->searchable()->label('Nome'),
                TextColumn::make('')->sortable()->searchable()->label('Estágio'),
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
            'index' => Pages\ListOrientadores::route('/'),
            'create' => Pages\CreateOrientadores::route('/create'),
            'edit' => Pages\EditOrientadores::route('/{record}/edit'),
        ];
    }    
}
