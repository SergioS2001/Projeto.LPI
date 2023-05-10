<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UsersResource\Pages;
use App\Filament\Resources\UsersResource\RelationManagers;
use App\Models\Instituicao_Aluno;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Card;

class UsersResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Utilizadores';

    protected static ?string $recordTitleAttribute = 'name';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('name')->required()
                    ->label('Nome'),
                    TextInput::make('email')->required()
                    ->label('Email'),
                    Select::make('instituicao_aluno_id')
                    ->label('Instituição')
                    ->options(Instituicao_Aluno::all()->pluck('nome', 'id'))
                    ->searchable(),
                    TextInput::make('cartão_cidadão')->required()
                    ->label('Cartão Cidadão'),
                    TextInput::make('telemóvel')->required()
                    ->label('Número Telemóvel'),
                    TextInput::make('morada')->required()
                    ->label('Morada'),
                    TextInput::make('Email alternativo')->label('Email alternativo'),
                    Checkbox::make('isExterno')
                    ->label('Externo?'),
                    Checkbox::make('isOrientador')
                    ->label('Orientador?'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //TextColumn::make('id')->sortable()->searchable(),
                IconColumn::make('isOrientador')->label('Orientador')->boolean()->sortable()->searchable(),
                IconColumn::make('isExterno')->label('Externo')->boolean()->sortable()->searchable(),
                TextColumn::make('name')->sortable()->searchable()->limit(12)->label('Nome'),
                TextColumn::make('instituicao_aluno.numero_aluno')->sortable()->searchable()->label("Número Aluno"),
                TextColumn::make('email')->sortable()->searchable()->limit(15)->label("Email"),
                TextColumn::make('data_nascimento')->date()->sortable()->searchable()->label("Data nascimento"),
                TextColumn::make('telemóvel')->sortable()->limit(9)->label("Telemóvel"),
                TextColumn::make('cartão_cidadão')->sortable()->searchable()->limit(8)->label('CC'),
                TextColumn::make('morada')->sortable()->searchable()->limit(25)->label("Morada"),
                TextColumn::make('email_alternativo')->sortable()->searchable()->limit(15)->label("Email alternativo"),
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
