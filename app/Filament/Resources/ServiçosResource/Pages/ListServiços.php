<?php

namespace App\Filament\Resources\ServiçosResource\Pages;

use App\Filament\Resources\ServiçosResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServiços extends ListRecords
{
    protected static string $resource = ServiçosResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
