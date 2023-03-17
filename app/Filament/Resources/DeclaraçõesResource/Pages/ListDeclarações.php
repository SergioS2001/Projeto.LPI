<?php

namespace App\Filament\Resources\DeclaraçõesResource\Pages;

use App\Filament\Resources\DeclaraçõesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDeclarações extends ListRecords
{
    protected static string $resource = DeclaraçõesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
