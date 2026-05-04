<?php
namespace App\Filament\Resources;
use App\Filament\Resources\GalleryItemResource\Pages;
use App\Models\GalleryItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GalleryItemResource extends Resource
{
    protected static ?string $model = GalleryItem::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'News & Events'; // Grouped with News

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')->required(),
            Forms\Components\Select::make('media_type')->options(['image' => 'Image', 'video' => 'Video'])->required()->live(),
            Forms\Components\TextInput::make('caption')->required(),
            
            Forms\Components\FileUpload::make('thumbnail')->image()->directory('gallery')->required()->columnSpanFull(),
            
            Forms\Components\TextInput::make('video_url')->url()
                ->visible(fn (Forms\Get $get) => $get('media_type') === 'video'),
            Forms\Components\TextInput::make('duration')
                ->visible(fn (Forms\Get $get) => $get('media_type') === 'video')->placeholder('e.g. 03:45'),

            Forms\Components\Toggle::make('is_active')->default(true),
            Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('thumbnail'),
            Tables\Columns\TextColumn::make('title')->searchable(),
            Tables\Columns\TextColumn::make('media_type')->badge(),
            Tables\Columns\ToggleColumn::make('is_active'),
            Tables\Columns\TextInputColumn::make('sort_order')->sortable(),
        ])->reorderable('sort_order')->actions([Tables\Actions\EditAction::make()]);
    }
    public static function getPages(): array { return ['index' => Pages\ListGalleryItems::route('/'), 'create' => Pages\CreateGalleryItem::route('/create'), 'edit' => Pages\EditGalleryItem::route('/{record}/edit')]; }
}