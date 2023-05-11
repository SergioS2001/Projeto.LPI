<?php

namespace App\Filament\Resources\OrientaçãoEstagiosResource\Pages;

use App\Filament\Resources\OrientaçãoEstagiosResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrientaçãoEstagios extends ListRecords
{
    protected static string $resource = OrientaçãoEstagiosResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
