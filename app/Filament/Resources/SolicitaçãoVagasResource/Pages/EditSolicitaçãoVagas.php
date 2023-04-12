<?php

namespace App\Filament\Resources\SolicitaçãoVagasResource\Pages;

use App\Filament\Resources\SolicitaçãoVagasResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSolicitaçãoVagas extends EditRecord
{
    protected static string $resource = SolicitaçãoVagasResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
