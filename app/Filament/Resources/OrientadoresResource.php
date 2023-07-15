<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrientadoresResource\Pages;
use App\Filament\Resources\OrientadoresResource\RelationManagers;
use App\Models\Orientadores;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;

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
                    Select::make('users_id')
                ->required()
                ->label('Utilizador')
                ->options(User::all()->pluck('name', 'id'))
                ->searchable(),
                    TextInput::make('celula_profissional')->label('Célula Profissional'),
                    DatePicker::make('admissao')->label('Data de admissão'),
                    DatePicker::make('validade')->label('Validade'),
                    TextInput::make('responsavel_assinatura')->label('Assinatura'),
                    Checkbox::make('users.isOrientador')->label('Orientador'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->label('id'),
                TextColumn::make('users.name')->sortable()->searchable()->label('Nome'),
                TextColumn::make('celula_profissional')->sortable()->searchable()->label('Célula Profissional'),
                TextColumn::make('admissao')->sortable()->searchable()->label('Data de Admissão'),
                TextColumn::make('validade')->sortable()->searchable()->label('Validade'),
                TextColumn::make('responsavel_assinatura')->sortable()->searchable()->label('Assinatura'),
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
            'index' => Pages\ListOrientadores::route('/'),
            'create' => Pages\CreateOrientadores::route('/create'),
            'edit' => Pages\EditOrientadores::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['celula_profissional', 'admissao','validade'];
    }
}
