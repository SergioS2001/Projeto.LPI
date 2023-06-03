<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrientaçãoEstagiosResource\Pages;
use App\Filament\Resources\OrientaçãoEstagiosResource\RelationManagers;
use App\Models\Estágios;
use App\Models\Orientadores;
use App\Models\Orientação_Estagios;
use App\Models\User;
use Database\Seeders\EstágiosSeeder;
use Database\Seeders\Orientacao_Estagios;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class OrientaçãoEstagiosResource extends Resource
{
    protected static ?string $model = Orientação_Estagios::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Estágios/Ensinos Clínicos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('users_id')
            ->label('Utilizadores')
            ->options(User::all()->pluck('name', 'id'))
            ->searchable(),
                Select::make('estágios_id')
                ->label('Estágios')
                ->options(Estágios::all()->pluck('nome', 'id'))
                ->searchable(),
                Select::make('orientadores_id')
                ->label('Orientadores')
                ->options(Orientadores::all()->pluck('users.name', 'id'))
                ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('users.name')->sortable()->searchable()->label('Aluno'),
                TextColumn::make('estágios.nome')->sortable()->searchable()->label('Estágio'),
                TextColumn::make('orientador.users.name')->sortable()->searchable()->label('Orientador'),
                TextColumn::make('horario_apresentacao')->sortable()->searchable()->label('Apresentação 1º dia'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                \Filament\Tables\Actions\DeleteAction::make(),
                \Filament\Tables\Actions\Action::make('PDF')
                ->icon('heroicon-o-document-download')
                ->url(fn (Orientação_Estagios $record) => route('pdfoe', $record))
                ->openUrlInNewTab()
                ->label(fn ($record) => Str::upper('PDF')),
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
            'index' => Pages\ListOrientaçãoEstagios::route('/'),
            'create' => Pages\CreateOrientaçãoEstagios::route('/create'),
            'edit' => Pages\EditOrientaçãoEstagios::route('/{record}/edit'),
        ];
    }    
}
