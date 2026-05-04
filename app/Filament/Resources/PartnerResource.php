<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnerResource\Pages;
use App\Models\Partner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PartnerResource extends Resource
{
    protected static ?string $model = Partner::class;
    protected static ?string $navigationIcon = 'heroicon-o-hand-raised';
    protected static ?string $navigationGroup = 'About Us';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Partner Info')->schema([
                    Forms\Components\TextInput::make('name')->required(),
                    Forms\Components\TextInput::make('acronym'),
                    Forms\Components\Select::make('partnership_type')
                        ->options([
                            'academic' => 'Academic Institution',
                            'industry' => 'Industry Partner',
                            'government' => 'Government Body',
                            'international' => 'International Organisation',
                            'mou' => 'MoU Partner',
                        ])->required()->default('academic'),
                    Forms\Components\TextInput::make('country'),
                    Forms\Components\TextInput::make('website_url')->url(),
                    Forms\Components\Textarea::make('description')->columnSpanFull(),
                ])->columns(2),

                Forms\Components\Section::make('Memorandum of Understanding (MoU)')->schema([
                    Forms\Components\DatePicker::make('mou_signed_date'),
                    Forms\Components\DatePicker::make('mou_expiry_date'),
                ])->columns(2),

                Forms\Components\Section::make('Media & Visibility')->schema([
                    Forms\Components\FileUpload::make('logo')->image()->directory('partners')->columnSpanFull(),
                    Forms\Components\Toggle::make('is_active')->default(true),
                    Forms\Components\Toggle::make('show_on_homepage')->default(false)->label('Show in Homepage Carousel'),
                    Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
                ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')->square(),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('partnership_type')->badge(),
                Tables\Columns\TextColumn::make('country')->searchable(),
                Tables\Columns\ToggleColumn::make('show_on_homepage'),
                Tables\Columns\ToggleColumn::make('is_active'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                Tables\Filters\SelectFilter::make('partnership_type')
                    ->options([
                        'academic' => 'Academic',
                        'industry' => 'Industry',
                        'government' => 'Government',
                        'international' => 'International',
                        'mou' => 'MoU',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->reorderable('sort_order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPartners::route('/'),
            'create' => Pages\CreatePartner::route('/create'),
            'edit' => Pages\EditPartner::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScopes([SoftDeletingScope::class]);
    }
}