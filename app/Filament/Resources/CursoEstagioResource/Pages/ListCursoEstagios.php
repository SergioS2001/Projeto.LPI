<?php

namespace App\Filament\Resources\CursoEstagioResource\Pages;

use App\Filament\Resources\CursoEstagioResource;
use App\Filament\Resources\CursoEstagioResource\Widgets\CursoEstagioStatsOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCursoEstagios extends ListRecords
{
    protected static string $resource = CursoEstagioResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets() : array
    {
        return[
        CursoEstagioStatsOverview::class,
        ];
    }
}
