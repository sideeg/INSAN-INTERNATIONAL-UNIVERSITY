<?php
namespace App\Filament\Resources\StaffProfileResource\Pages;
use App\Filament\Resources\StaffProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStaffProfiles extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = StaffProfileResource::class;
    protected function getHeaderActions(): array {
        return [ Actions\LocaleSwitcher::make(), Actions\CreateAction::make() ];
    }
}