<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EstagiosResource\Pages;
use App\Filament\Resources\EstagiosResource\RelationManagers;
use App\Models\Estagio;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EstagiosResource extends Resource
{
    protected static ?string $model = Estagio::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('Nome')->required(),
                //TextInput::make('Nome do Orientador'),
                Select::make('id_orientador')->required()
                ->label('Orientador')
                ->options(User::all()->pluck('name', 'id'))
                ->searchable(),
                TextInput::make('Serviço')->required(),
                TextInput::make('Tipologia')->required(),
                TextInput::make('Ano curricular')->required()
                ->numeric()
                ->minValue(1)
                ->maxValue(5),
                DatePicker::make('Data inicial')
                ->minDate(now()),
                //->maxDate(now()->addYear(1)),
                DatePicker::make('Data final')
                ->minDate(now()),
                //->maxDate(now()->addYear(1)),
                //TextInput::make('Data inicial'),
                //TextInput::make('Data final'),
                TextInput::make('Avaliação'),
                FileUpload::make('Ficheiros')->multiple()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('Nome')->sortable()->searchable(),
                TextColumn::make('Orientador')->sortable()->searchable(),
                TextColumn::make('Serviço')->sortable()->searchable(),
                TextColumn::make('Ano curricular')->sortable()->searchable(),
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
            'index' => Pages\ListEstagios::route('/'),
            'create' => Pages\CreateEstagios::route('/create'),
            'edit' => Pages\EditEstagios::route('/{record}/edit'),
        ];
    }    
}
