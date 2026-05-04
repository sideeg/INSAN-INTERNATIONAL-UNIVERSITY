<?php

namespace App\Filament\Resources\InternationalServiceResource\Pages;

use App\Filament\Resources\InternationalServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInternationalServices extends ListRecords
{
    protected static string $resource = InternationalServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
