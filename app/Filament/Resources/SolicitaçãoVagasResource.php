<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SolicitaçãoVagasResource\Pages;
use App\Filament\Resources\SolicitaçãoVagasResource\RelationManagers;
use App\Models\Cacifos;
use App\Models\Cursos_Estágios;
use App\Models\Estágios;
use App\Models\Instituição_Estágio;
use App\Models\Orientacao_Estagios;
use App\Models\Serviços;
use App\Models\Solicitação_Vagas;
use App\Models\Tipologia_Estágio;
use App\Models\Unidades_Curriculares;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;

class SolicitaçãoVagasResource extends Resource
{
    protected static ?string $model = Solicitação_Vagas::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Estágios/Ensinos Clínicos';

    public static function form(Form $form): Form
    {
        return $form
                ->schema([
                    Card::make()->schema([
                    Select::make('estágios_id')
                    ->label('Selecionar Estágio')
                    ->options(Estágios::all()->pluck('nome', 'id'))
                    ->searchable(),
                    TextInput::make('designação')->required()
                    ->label('Designação Solicitação'),
                    TextInput::make('ano_letivo')->required()
                    ->label('Ano Letivo')
                    ->placeholder('formato: 20xx/20xx'),
                    TextInput::make('vagas')->required()
                    ->label('Vagas')
                    ->numeric()
                    ->minValue(1),
                    TextInput::make('carga_horaria_total')->required()
                    ->label('Carga Horária')
                    ->numeric()
                    ->minValue(1),
                    Textarea::make('objetivos')
                    ->required()
                    ->label('Objetivos')
                    ->rows(5)
                    ->cols(50),
                    FileUpload::make('file')
                    ->preserveFilenames()
                    ->label('Upload File')
                    ->acceptedFileTypes(['application/pdf'])
                    ->multiple()
                    ->enableDownload()
                    ->enableReordering(),
                    Checkbox::make('isExterno')
                    ->label('Estágio Externo?'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('id'),
                TextColumn::make('estagio.nome')->sortable()->searchable()->label('Estágio'),
                TextColumn::make('designação')->sortable()->searchable()->label('Designação'),
                TextColumn::make('ano_letivo')->sortable()->searchable()->label('Ano letivo'),
                TextColumn::make('vagas')->sortable()->searchable()->label('Vagas'),
                TextColumn::make('carga_horaria_total')->sortable()->searchable()->label('Carga Horaria Total'),
                TextColumn::make('objetivos')->sortable()->searchable()->label('Objetivos'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                \Filament\Tables\Actions\DeleteAction::make(),
                \Filament\Tables\Actions\Action::make('PDF')
                ->icon('heroicon-o-document-download')
                ->url(fn (Solicitação_Vagas $record) => route('pdfsolicitacaovagas', $record))
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
            'index' => Pages\ListSolicitaçãoVagas::route('/'),
            'create' => Pages\CreateSolicitaçãoVagas::route('/create'),
            'edit' => Pages\EditSolicitaçãoVagas::route('/{record}/edit'),
        ];
    }    

    public static function getGloballySearchableAttributes(): array
{
    return ['designação', 'objetivos', 'ano_letivo', 'vagas','carga_horaria_total'];
}

}
