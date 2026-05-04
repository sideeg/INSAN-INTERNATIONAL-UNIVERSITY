<?php

namespace App\Filament\Resources\InternationalServiceResource\Pages;

use App\Filament\Resources\InternationalServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInternationalService extends EditRecord
{
    protected static string $resource = InternationalServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
