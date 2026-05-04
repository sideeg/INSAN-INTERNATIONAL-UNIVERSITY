<?php

namespace App\Filament\Resources\StudentLeaderResource\Pages;

use App\Filament\Resources\StudentLeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudentLeader extends EditRecord
{
    protected static string $resource = StudentLeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
