<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CauçõesResource\Pages;
use App\Filament\Resources\CauçõesResource\RelationManagers;
use App\Filament\Resources\CauçõesResource\Widgets\CauçõesStatsOverview;
use App\Models\Cacifos;
use App\Models\Cauções;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;

class CauçõesResource extends Resource
{
    protected static ?string $model = Cauções::class;
    protected static ?string $recordTitleAttribute = 'valor';
    protected static ?string $navigationGroup = 'Cacifos';
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                TextInput::make('valor')->required()
                ->numeric()
                ->label('Valor'),
                Checkbox::make('isPago')
                ->label('Pagamento'),
                Checkbox::make('isDevolvido')
                ->label('Reembolso'),
                Checkbox::make('isAssinadoAluno')
                ->label('Papel assinado Aluno'),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->searchable()->limit(12)->label('Número Caução'),
                TextColumn::make('valor')->sortable()->searchable()->label('Montante'),
                IconColumn::make('isPago')->label('Pagamento')->boolean(),
                IconColumn::make('isDevolvido')->label('Reembolso')->boolean(),
                IconColumn::make('isAssinadoAluno')->label('Papel assinado')->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                DeleteAction::make(),
                \Filament\Tables\Actions\Action::make('PDF')
                ->icon('heroicon-o-document-download')
                ->url(fn (Cauções $record) => route('pdfcauções', $record))
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
            CauçõesStatsOverview::class,
        ];
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCauções::route('/'),
            'create' => Pages\CreateCauções::route('/create'),
            'edit' => Pages\EditCauções::route('/{record}/edit'),
        ];
    }
}
