<?php

namespace App\Filament\Resources\AcademicCalendarEventResource\Pages;

use App\Filament\Resources\AcademicCalendarEventResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAcademicCalendarEvents extends ListRecords
{
    protected static string $resource = AcademicCalendarEventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
