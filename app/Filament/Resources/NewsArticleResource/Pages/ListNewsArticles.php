<?php
namespace App\Filament\Resources\NewsArticleResource\Pages;
use App\Filament\Resources\NewsArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNewsArticles extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = NewsArticleResource::class;
    protected function getHeaderActions(): array {
        return [ Actions\LocaleSwitcher::make(), Actions\CreateAction::make() ];
    }
}