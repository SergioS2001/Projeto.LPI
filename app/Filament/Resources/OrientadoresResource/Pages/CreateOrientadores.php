<?php

namespace App\Filament\Resources\OrientadoresResource\Pages;

use App\Filament\Resources\OrientadoresResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrientadores extends CreateRecord
{
    protected static string $resource = OrientadoresResource::class;
    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
