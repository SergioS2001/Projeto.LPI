<?php

namespace App\Filament\Resources\QuestionárioAlunoResource\Pages;

use App\Filament\Resources\QuestionárioAlunoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQuestionárioAlunos extends ListRecords
{
    protected static string $resource = QuestionárioAlunoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
