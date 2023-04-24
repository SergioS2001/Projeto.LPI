<?php

namespace App\Filament\Resources\InstituiçõesResource\Pages;

use App\Filament\Resources\InstituiçõesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateInstituições extends CreateRecord
{
    protected static string $resource = InstituiçõesResource::class;

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
