<?php
namespace App\Filament\Resources\NewsArticleResource\Pages;
use App\Filament\Resources\NewsArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNewsArticle extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = NewsArticleResource::class;
    protected function getHeaderActions(): array {
        return [ Actions\LocaleSwitcher::make(), Actions\DeleteAction::make() ];
    }
}