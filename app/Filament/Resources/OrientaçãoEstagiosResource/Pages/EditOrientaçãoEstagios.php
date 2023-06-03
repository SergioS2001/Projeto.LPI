<?php

namespace App\Filament\Resources\OrientaçãoEstagiosResource\Pages;

use App\Filament\Resources\OrientaçãoEstagiosResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrientaçãoEstagios extends EditRecord
{
    protected static string $resource = OrientaçãoEstagiosResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
