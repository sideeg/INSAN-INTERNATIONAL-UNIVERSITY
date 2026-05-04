<?php
namespace App\Filament\Resources\ScholarshipResource\Pages;
use App\Filament\Resources\ScholarshipResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListScholarships extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = ScholarshipResource::class;
    protected function getHeaderActions(): array {
        return [ Actions\LocaleSwitcher::make(), Actions\CreateAction::make() ];
    }
}