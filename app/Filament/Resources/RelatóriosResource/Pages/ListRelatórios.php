<?php

namespace App\Filament\Resources\RelatóriosResource\Pages;

use App\Filament\Resources\RelatóriosResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRelatórios extends ListRecords
{
    protected static string $resource = RelatóriosResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
