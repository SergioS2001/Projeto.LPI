<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UsersResource\Pages;
use App\Filament\Resources\UsersResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class UsersResource extends Resource
{
    protected static ?string $model = User::class;

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
                //TextColumn::make('id')->sortable()->searchable(),
                TextColumn::make('tipo Aluno')->sortable()->label('tipo'),
                TextColumn::make('name')->sortable()->searchable()->limit(12)->label('Nome'),
                TextColumn::make('email')->sortable()->searchable()->limit(15),
                TextColumn::make('data_nascimento')->date()->sortable()->searchable(),
                TextColumn::make('telemóvel')->sortable()->limit(9),
                TextColumn::make('cartão_cidadão')->sortable()->searchable()->limit(8)->label('CC'),
                TextColumn::make('morada')->sortable()->searchable()->limit(12),
                TextColumn::make('email_alternativo')->sortable()->searchable()->limit(15),
                TextColumn::make('permissions')->sortable(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUsers::route('/create'),
            'edit' => Pages\EditUsers::route('/{record}/edit'),
        ];
    }    
}
