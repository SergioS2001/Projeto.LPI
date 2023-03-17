<?php

namespace App\Filament\Resources\CertificadosResource\Pages;

use App\Filament\Resources\CertificadosResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCertificados extends ListRecords
{
    protected static string $resource = CertificadosResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
