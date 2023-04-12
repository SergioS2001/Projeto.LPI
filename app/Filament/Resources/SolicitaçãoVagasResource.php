<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SolicitaçãoVagasResource\Pages;
use App\Filament\Resources\SolicitaçãoVagasResource\RelationManagers;
use App\Models\Cacifos;
use App\Models\Curso_Estagio;
use App\Models\Instituição_Estágio;
use App\Models\Orientacao_Estagios;
use App\Models\Serviços;
use App\Models\Solicitação_Vagas;
use App\Models\Tipologia_Estágio;
use App\Models\Unidade_Curricular;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
class SolicitaçãoVagasResource extends Resource
{
    protected static ?string $model = Solicitação_Vagas::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Estágios/Ensinos Clínicos';

    public static function form(Form $form): Form
    {
        return $form
                ->schema([
                    Card::make()->schema([TextInput::make('nome')->label('Nome')->required(),
                    Select::make('orientadores_id')
                    ->label('Orientadores')
                    ->options(Orientacao_Estagios::all()->pluck('nome', 'id'))
                    ->searchable(),
                    Select::make('instituicao_estagio_id')->required()
                    ->label('Instituição')
                    ->options(Instituição_Estágio::all()->pluck('nome', 'id'))
                    ->searchable(),
                    Select::make('curso_estagio_id')->required()
                    ->label('Curso')
                    ->options(Curso_Estagio::all()->pluck('curso', 'id'))
                    ->searchable(),
                    Select::make('unidade_curricular_id')->required()
                    ->label('Unidade Curricular')
                    ->options(Unidade_Curricular::all()->pluck('nome', 'id'))
                    ->searchable(),
                    TextInput::make('Ano curricular')->required()
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(5),
                    Select::make('serviços_id')->required()
                    ->label('Serviços')
                    ->options(Serviços::all()->pluck('titulo', 'id'))
                    ->searchable(),
                    Select::make('tipologia_estagio_id')->required()
                    ->label('Tipologia')
                    ->options(Tipologia_Estágio::all()->pluck('titulo', 'id'))
                    ->searchable(),
                    DatePicker::make('Data Inicial')
                    ->minDate(now())
                    ->required(),
                    DatePicker::make('Data Final')
                    ->minDate(now()),
                    Select::make('cacifos_id')->required()
                    ->label('Cacifo')
                    ->options(Cacifos::all()->pluck('numero', 'id'))
                    ->searchable(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListSolicitaçãoVagas::route('/'),
            'create' => Pages\CreateSolicitaçãoVagas::route('/create'),
            'edit' => Pages\EditSolicitaçãoVagas::route('/{record}/edit'),
        ];
    }    
}
