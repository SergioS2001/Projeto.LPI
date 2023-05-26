<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CacifosEstágiosResource\Pages;
use App\Filament\Resources\CacifosEstágiosResource\RelationManagers;
use App\Filament\Resources\CacifosEstágiosResource\Widgets\CacifosEstágiosStatsOverview;
use App\Models\Cacifos;
use App\Models\Cacifos_Estágios;
use App\Models\Estágios;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class CacifosEstágiosResource extends Resource
{
    protected static ?string $model = Cacifos_Estágios::class;
    protected static ?string $navigationGroup = 'Cacifos';
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                Select::make('users_id')
                ->label('Aluno')
                ->options(User::all()->pluck('name', 'id'))
                ->required()
                ->searchable(),
                Select::make('estágios_id')
                ->label('Estágio')
                ->options(Estágios::all()->pluck('nome', 'id'))
                ->required()
                ->searchable(),
                Select::make('cacifos_id')
                ->label('Cacifo')
                ->options(Cacifos::all()->pluck('numero', 'id'))
                ->searchable(),
                Checkbox::make('fardamento')
                ->label('Fardamento?'),
                ])
        ]);;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('users.name')->sortable()->label('Aluno'),
                TextColumn::make('estágios.nome')->sortable()->label('Estágio'),
                TextColumn::make('cacifos.numero')->sortable()->label('Cacifo'),
                TextColumn::make('cauções.id')->sortable()->label('Número Caução'),
                IconColumn::make('fardamento')->label('Fardamento necessário')->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                \Filament\Tables\Actions\DeleteAction::make(),
                \Filament\Tables\Actions\Action::make('PDF')
                ->icon('heroicon-o-document-download')
                ->url(fn (Cacifos_Estágios $record) => route('pdfcacifoestagio', $record))
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
            CacifosEstágiosStatsOverview::class,
        ];
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCacifosEstágios::route('/'),
            'create' => Pages\CreateCacifosEstágios::route('/create'),
            'edit' => Pages\EditCacifosEstágios::route('/{record}/edit'),
        ];
    }    
}
