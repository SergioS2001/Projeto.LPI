<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgendamentosResource\Pages;
use App\Filament\Resources\AgendamentosResource\RelationManagers;
use App\Models\Agendamentos;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class AgendamentosResource extends Resource
{
    protected static ?string $model = Agendamentos::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Calendário';
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                TextInput::make('nome')
                ->label('Nome'),
                TextInput::make('descrição')
                ->label('Descrição'),
                DatePicker::make('data')
                ->minDate(now())
                ->label('Data')
                ->required(),
                TextInput::make('hora')
                ->label('Hora Inicio'),
                TextInput::make('hora_fim')
                ->label('Hora Fim'),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome')->sortable()->searchable()->label('Nome'),
                TextColumn::make('descrição')->sortable()->searchable()->label('Descrição'),
                TextColumn::make('data')->date()->sortable()->searchable()->label('Data'),
                TextColumn::make('hora')->sortable()->searchable()->label('Hora Inicio'),
                TextColumn::make('hora_fim')->sortable()->searchable()->label('Hora Fim'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                \Filament\Tables\Actions\DeleteAction::make(),
                \Filament\Tables\Actions\Action::make('PDF')
                ->icon('heroicon-o-document-download')
                ->url(fn (Agendamentos $record) => route('pdfestágios', $record))
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
            'index' => Pages\ListAgendamentos::route('/'),
            'create' => Pages\CreateAgendamentos::route('/create'),
            'edit' => Pages\EditAgendamentos::route('/{record}/edit'),
        ];
    }
    public static function getGloballySearchableAttributes(): array
    {
        return ['nome', 'descrição','data','hora','hora_fim'];
    }

}
