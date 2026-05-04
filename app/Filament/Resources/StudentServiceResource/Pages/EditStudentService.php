<?php

namespace App\Filament\Resources\StudentServiceResource\Pages;

use App\Filament\Resources\StudentServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudentService extends EditRecord
{
    protected static string $resource = StudentServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
