<?php

namespace App\Filament\Resources\StudentServiceResource\Pages;

use App\Filament\Resources\StudentServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStudentServices extends ListRecords
{
    protected static string $resource = StudentServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
