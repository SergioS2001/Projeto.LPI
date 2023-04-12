<?php

namespace App\Filament\Resources\InstituiçõesResource\Pages;

use App\Filament\Resources\InstituiçõesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInstituições extends ListRecords
{
    protected static string $resource = InstituiçõesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
