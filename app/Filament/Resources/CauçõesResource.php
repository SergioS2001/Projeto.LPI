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
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class CauçõesResource extends Resource
{
    protected static ?string $model = Cauções::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                TextInput::make('valor')->required()
                ->label('Valor'),
                Checkbox::make('isPago')
                ->label('Pagamento'),
                Checkbox::make('isDevolvido')
                ->label('Reembolso'),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->searchable()->limit(12)->label('Caução'),
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
