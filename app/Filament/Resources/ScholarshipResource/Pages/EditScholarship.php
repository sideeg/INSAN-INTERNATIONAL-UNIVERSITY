<?php
namespace App\Filament\Resources\ScholarshipResource\Pages;
use App\Filament\Resources\ScholarshipResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditScholarship extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = ScholarshipResource::class;
    protected function getHeaderActions(): array {
        return [ Actions\LocaleSwitcher::make(), Actions\DeleteAction::make() ];
    }
}