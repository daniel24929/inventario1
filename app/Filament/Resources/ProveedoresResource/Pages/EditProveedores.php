<?php

namespace App\Filament\Resources\ProveedoresResource\Pages;

use App\Filament\Resources\ProveedoresResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProveedores extends EditRecord
{
    protected static string $resource = ProveedoresResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
