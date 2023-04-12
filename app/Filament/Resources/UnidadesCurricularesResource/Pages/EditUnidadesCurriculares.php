<?php

namespace App\Filament\Resources\UnidadesCurricularesResource\Pages;

use App\Filament\Resources\UnidadesCurricularesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUnidadesCurriculares extends EditRecord
{
    protected static string $resource = UnidadesCurricularesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
