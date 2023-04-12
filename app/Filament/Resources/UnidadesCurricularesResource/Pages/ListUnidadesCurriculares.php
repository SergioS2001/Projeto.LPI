<?php

namespace App\Filament\Resources\UnidadesCurricularesResource\Pages;

use App\Filament\Resources\UnidadesCurricularesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUnidadesCurriculares extends ListRecords
{
    protected static string $resource = UnidadesCurricularesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
