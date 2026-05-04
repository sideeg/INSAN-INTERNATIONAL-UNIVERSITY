<?php

namespace App\Filament\Resources\ProgrammeResource\Pages;

use App\Filament\Resources\ProgrammeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProgrammes extends ListRecords
{
    use ListRecords\Concerns\Translatable; // Add this

    protected static string $resource = ProgrammeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(), // Add this
            Actions\CreateAction::make(),
        ];
    }
}