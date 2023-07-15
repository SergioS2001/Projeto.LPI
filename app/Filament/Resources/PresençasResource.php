<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PresençasResource\Pages;
use App\Filament\Resources\PresençasResource\RelationManagers;
use App\Filament\Resources\PresençasResource\Widgets\PresençasStatsOverview;
use App\Models\Estágios;
use App\Models\Orientação_Estagios;
use App\Models\Presenças;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;

class PresençasResource extends Resource
{
    protected static ?string $model = Presenças::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Acompanhamento Estágio/EC';
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                Select::make('orientação_estagios_id')
                ->required()
                ->label('Aluno')
                ->searchable()
                ->options(function () {
                    $orientacaoEstagios = Orientação_Estagios::with('users')->get();
                    return $orientacaoEstagios->pluck('users.name', 'id');
                }),
                Select::make('estágios_id')
                ->required()
                ->label('Estágio/EC')
                ->searchable()
                ->options(function () {
                    return Estágios::pluck('nome', 'id');
                }),
                DatePicker::make('data')
                ->label("Data")
                ->minDate(now())
                ->required(),
                TimePicker::make('h_entrada')
                 ->required()
                ->label('Hora de Entrada'),
                TimePicker::make('h_saida')
                ->required()
                ->label('Hora de Saída'),
                TextInput::make('tempo_pausa')
                ->required()
                ->label('Tempo de pausa (minutos)'),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('orientação_estagios.estágios.nome')->sortable()->searchable()->limit(12)->label('Estágio'),
                TextColumn::make('orientação_estagios.users.name')->sortable()->searchable()->limit(12)->label('Aluno'),
                TextColumn::make('data')->date()->sortable()->searchable(),
                TextColumn::make('h_entrada')->sortable()->label('Entrada(h)'),
                TextColumn::make('tempo_pausa')->sortable()->label('Pausa(min)'),
                TextColumn::make('h_saida')->sortable()->label('Saída(h)'),
                IconColumn::make('isValidated')->sortable()->searchable()->label('Presença Validada')->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                \Filament\Tables\Actions\DeleteAction::make(),
                \Filament\Tables\Actions\Action::make('PDF')
                ->icon('heroicon-o-document-download')
                ->url(fn (Presenças $record) => route('pdfpresenças', $record))
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
            PresençasStatsOverview::class,
        ];
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPresenças::route('/'),
            'create' => Pages\CreatePresenças::route('/create'),
            'edit' => Pages\EditPresenças::route('/{record}/edit'),
        ];
    }
    public static function getGloballySearchableAttributes(): array
    {
        return ['orientação_estagios.estágios.nome', 'orientação_estagios.users.name','orientação_estagios.orientador.users.name','data','h_entrada','h_saida'];
    }

}
