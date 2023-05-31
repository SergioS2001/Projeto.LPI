<?php

namespace App\Filament\Resources\QuestionárioAlunoResource\Pages;

use App\Filament\Resources\QuestionárioAlunoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQuestionárioAluno extends EditRecord
{
    protected static string $resource = QuestionárioAlunoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
