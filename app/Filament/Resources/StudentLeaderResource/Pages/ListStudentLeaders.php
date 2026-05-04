<?php

namespace App\Filament\Resources\StudentLeaderResource\Pages;

use App\Filament\Resources\StudentLeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStudentLeaders extends ListRecords
{
    protected static string $resource = StudentLeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
