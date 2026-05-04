<?php
namespace App\Filament\Resources\StaffProfileResource\Pages;
use App\Filament\Resources\StaffProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStaffProfile extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = StaffProfileResource::class;
    protected function getHeaderActions(): array {
        return [ Actions\LocaleSwitcher::make(), Actions\DeleteAction::make(), Actions\RestoreAction::make() ];
    }
}