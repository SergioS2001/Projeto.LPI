<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EstágiosResource\Pages;
use App\Filament\Resources\EstágiosResource\RelationManagers;
use App\Models\Estágios;
use App\Models\Orientador;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;

class EstágiosResource extends Resource
{
    protected static ?string $model = Estágios::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Estágios/Ensinos Clínicos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('Nome')->required(),
                Select::make('id_orientador')->required()
                ->label('Orientador')
                ->options(Orientador::all()->pluck('name', 'id'))
                ->searchable(),
                TextInput::make('Instituição')->required(),
                TextInput::make('Curso')->required(),
                TextInput::make('Unidade curricular')->required(),
                TextInput::make('Ano curricular')->required()
                ->numeric()
                ->minValue(1)
                ->maxValue(5),
                TextInput::make('Serviço')->required(),
                TextInput::make('Tipologia')->required(),
                DatePicker::make('Data Inicial')
                ->minDate(now())
                ->required(),
                DatePicker::make('Data Final')
                ->minDate(now()),
                //FileUpload::make('Avaliação')->multiple()
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
            'index' => Pages\ListEstágios::route('/'),
            'create' => Pages\CreateEstágios::route('/create'),
            'edit' => Pages\EditEstágios::route('/{record}/edit'),
        ];
    }    
}
