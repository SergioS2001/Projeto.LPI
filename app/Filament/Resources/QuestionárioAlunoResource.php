<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionárioAlunoResource\Pages;
use App\Filament\Resources\QuestionárioAlunoResource\RelationManagers;
use App\Models\Orientação_Estagios;
use App\Models\Questionário_Aluno;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
class QuestionárioAlunoResource extends Resource
{
    protected static ?string $model = Questionário_Aluno::class;

    protected static ?string $navigationGroup = 'Utilizadores';
    protected static ?string $navigationIcon = 'heroicon-o-collection';

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
                TextInput::make('integração')
                ->required()
                ->numeric()
                ->minValue(1)
                ->maxValue(5)
                ->label('Integração (1-5)'),
                TextInput::make('acompanhamento')
                ->required()
                ->numeric()
                ->minValue(1)
                ->maxValue(5)
                ->label('Acompanhamento'),
                TextInput::make('aquisição_conhecimentos')
                ->required()
                ->numeric()
                ->minValue(1)
                ->maxValue(5)
                ->label('Aquisição de Conhecimentos'),
                TextInput::make('disponibilidade')
                ->required()
                ->numeric()
                ->minValue(1)
                ->maxValue(5)
                ->label('Disponibilidade'),
                TextInput::make('satisfação')
                ->required()
                ->numeric()
                ->minValue(1)
                ->maxValue(5)
                ->label('Satisfação'),
                TextInput::make('apoio_administrativo')
                ->required()
                ->numeric()
                ->minValue(1)
                ->maxValue(5)
                ->label('Apoio Administrativo'),
                TextInput::make('apoio_orientador')
                ->required()
                ->numeric()
                ->minValue(1)
                ->maxValue(5)
                ->label('Apoio do Orientador'),
                TextInput::make('apreciação_global')
                ->required()
                ->numeric()
                ->minValue(1)
                ->maxValue(5)
                ->label('Apreciação Global do Estágio'),
                Textarea::make('sugestões')
                ->rows(5)
                ->cols(50)
                ->label('Sugestões'),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('orientação_estagios.users.name')->sortable()->searchable()->limit(12)->label('Aluno'),
                TextColumn::make('orientação_estagios.estágios.nome')->sortable()->searchable()->limit(12)->label('Estágio'),
                TextColumn::make('integração')->label('Integração')->sortable()->searchable(),
                TextColumn::make('acompanhamento')->label('Acompanhamento')->sortable()->searchable(),
                TextColumn::make('aquisição_conhecimentos')->label('Aquisição Conhecimentos')->sortable()->searchable(),
                TextColumn::make('disponibilidade')->label('Disponibilidade')->sortable()->searchable(),
                TextColumn::make('satisfação')->label('Satisfação')->sortable()->searchable(),
                TextColumn::make('apoio_administrativo')->label('Apoio Administrativo')->sortable()->searchable(),
                TextColumn::make('apoio_orientador')->label('Apoio Orientador')->sortable()->searchable(),
                TextColumn::make('apreciação_global')->label('Apreciação Global')->sortable()->searchable(),
                TextColumn::make('sugestões')->label('Sugestões')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                \Filament\Tables\Actions\DeleteAction::make(),
                \Filament\Tables\Actions\Action::make('Excel')
    ->icon('heroicon-o-document-download')
    ->url(fn (Questionário_Aluno $record) => route('csvquestionarioaluno', $record))
    ->openUrlInNewTab()
    ->label(fn ($record) => Str::upper('Excel')),

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
            'index' => Pages\ListQuestionárioAlunos::route('/'),
            'create' => Pages\CreateQuestionárioAluno::route('/create'),
            'edit' => Pages\EditQuestionárioAluno::route('/{record}/edit'),
        ];
    }    
}
