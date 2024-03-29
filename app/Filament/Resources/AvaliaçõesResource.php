<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AvaliaçõesResource\Pages;
use App\Filament\Resources\AvaliaçõesResource\RelationManagers;
use App\Models\Avaliações;
use App\Models\Estágios;
use App\Models\Orientadores;
use App\Models\Orientação_Estagios;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Action as ActionsAction;
use Illuminate\Support\Str;

class AvaliaçõesResource extends Resource
{
    protected static ?string $model = Avaliações::class;
    protected static ?string $recordTitleAttribute = 'nota';
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Acompanhamento Estágio/EC';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                Select::make('orientação_estagios_id')
                ->label('Utilizador')
                ->searchable()
                ->options(function () {
                    $orientacaoEstagios = Orientação_Estagios::with('users')->get();
                    return $orientacaoEstagios->pluck('users.name', 'id');
                }),
                Select::make('estágios_id')
                ->label('Estágio')
                ->searchable()
                ->options(function () {
                    return Estágios::pluck('nome', 'id');
                }),
                TextInput::make('nota_final')
                ->required()
                ->label('Nota final')
                ->numeric()
                ->minValue(1)
                ->maxValue(20),
                Checkbox::make('isDone')
                ->required()
                ->label('Concluído'),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('orientação_estagios.users.name')->sortable()->searchable()->limit(12)->label('Aluno'),
                TextColumn::make('orientação_estagios.estágios.nome')->sortable()->searchable()->label('Estágio'),
                //TextColumn::make('orientação_estagios.orientador.users.name')->sortable()->searchable()->label('Orientadores'),
                TextColumn::make('module_count')->sortable()->label('Número Módulos'),
                TextColumn::make('nota_final')->sortable()->label('Nota Final'),
                IconColumn::make('isDone')->label('Concluído')->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                \Filament\Tables\Actions\DeleteAction::make(),
                \Filament\Tables\Actions\Action::make('PDF')
                ->icon('heroicon-o-document-download')
                ->url(fn (Avaliações $record) => route('pdfavaliações', $record))
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
            'index' => Pages\ListAvaliações::route('/'),
            'create' => Pages\CreateAvaliações::route('/create'),
            'edit' => Pages\EditAvaliações::route('/{record}/edit'),
        ];
    }
    public static function getGloballySearchableAttributes(): array
    {
        return ['orientação_estagios.estágios.nome', 'nota_final', 'orientação_estagios.users.name','orientação_estagios.orientador.users.name'];
    }

}
