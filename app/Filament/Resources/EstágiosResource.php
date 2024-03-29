<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EstágiosResource\Pages;
use App\Filament\Resources\EstágiosResource\RelationManagers;
use App\Filament\Resources\EstágiosResource\Widgets\EstágiosStatsOverview;
use App\Models\Estágios;
use App\Models\Instituição_Estágio;
use App\Models\Cursos_Estágios;
use App\Models\Orientadores;
use App\Models\Cacifos;
use App\Models\Orientação_Estagios;
use App\Models\Serviços;
use App\Models\Tipologia_Estágio;
use App\Models\Unidades_Curriculares;
use App\Models\User;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Checkbox;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;
class EstágiosResource extends Resource
{
    protected static ?string $model = Estágios::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Estágios/Ensinos Clínicos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([TextInput::make('nome')->label('Nome')->required(),
                Select::make('orientadores_id')
                    ->label('Orientadores')
                    ->options(function () {
                        return Orientadores::with('users')->get()
                            ->mapWithKeys(function ($orientador) {
                                return [$orientador->id => $orientador->users->name];
                            })
                            ->all();
                    })
                    ->searchable(),
                Select::make('instituição_estagio_id')
                ->label('Instituição')
                ->options(Instituição_Estágio::all()->pluck('nome', 'id'))
                ->searchable(),
                Select::make('curso_estagio_id')
                ->label('Curso')
                ->options(Cursos_Estágios::all()->pluck('curso', 'id'))
                ->searchable(),
                Select::make('unidade_curricular_id')
                ->label('Unidade Curricular')
                ->options(Unidades_Curriculares::all()->pluck('nome', 'id'))
                ->searchable(),
                TextInput::make('Ano curricular')
                ->numeric()
                ->minValue(1)
                ->maxValue(5),
                Select::make('serviços_id')
                ->label('Serviços')
                ->options(Serviços::all()->pluck('titulo', 'id'))
                ->searchable(),
                Select::make('tipologia_estagio_id')
                ->label('Tipologia')
                ->options(Tipologia_Estágio::all()->pluck('titulo', 'id'))
                ->searchable(),
                DatePicker::make('data_inicial')
                ->label("Data Inicial")
                ->minDate(now()),
                DatePicker::make('data_final')
                ->label("Data Final")
                ->minDate(now()),
                Checkbox::make('isSolicitado')->label('Solicitado?'),
                Checkbox::make('isAdmitido')->label('Admitido?'),
                ])
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                IconColumn::make('isSolicitado')->label('Solicitado')->boolean(),
                IconColumn::make('isAdmitido')->label('Aprovado')->boolean(),
                TextColumn::make('nome')->sortable()->searchable(),
                TextColumn::make('instituicao_estagio.nome')->label('Instituição')->limit(12),
                TextColumn::make('curso_estagio.curso')->label('Curso')->limit(12),
                TextColumn::make('unidade_curricular.nome')->label('UC')->limit(12),
                TextColumn::make('ano_curricular')->label('Ano'),
                TextColumn::make('serviços.titulo')->label('Serviços')->limit(12),
                TextColumn::make('tipologia_estagio.titulo')->label('Tipologia')->limit(12),
                TextColumn::make('data_inicial')->label('Data Inicial'),
                TextColumn::make('data_final')->label('Data Final'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                \Filament\Tables\Actions\DeleteAction::make(),
                \Filament\Tables\Actions\Action::make('PDF')
                ->icon('heroicon-o-document-download')
                ->url(fn (Estágios $record) => route('pdfestágios', $record))
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
    
    public static function  getWidgets(): array
    {
        return [
            EstágiosStatsOverview::class,
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

    public static function getGloballySearchableAttributes(): array
    {
        return ['nome', 'isExterno', 'ano_curricular', 'data_inicial','data_final','serviços.titulo','tipologia_estagio.titulo','instituicao_estagio.nome'];
    }

}
