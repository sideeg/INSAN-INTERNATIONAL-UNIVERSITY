<?php

namespace App\Filament\Resources\ProgrammeResource\Pages;

use App\Filament\Resources\ProgrammeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProgramme extends EditRecord
{
    use EditRecord\Concerns\Translatable; // Add this

    protected static string $resource = ProgrammeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(), // Add this
            Actions\DeleteAction::make(),
        ];
    }
}