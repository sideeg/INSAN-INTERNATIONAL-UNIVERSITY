<?php
namespace App\Filament\Resources\NewsArticleResource\Pages;
use App\Filament\Resources\NewsArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNewsArticle extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = NewsArticleResource::class;
    protected function getHeaderActions(): array {
        return [ Actions\LocaleSwitcher::make() ];
    }
}