<?php
namespace App\Filament\Resources\ScholarshipResource\Pages;
use App\Filament\Resources\ScholarshipResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateScholarship extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = ScholarshipResource::class;
    protected function getHeaderActions(): array {
        return [ Actions\LocaleSwitcher::make() ];
    }
}