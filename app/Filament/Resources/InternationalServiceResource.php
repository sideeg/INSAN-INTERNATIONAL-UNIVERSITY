<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InternationalServiceResource\Pages;
use App\Models\InternationalService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class InternationalServiceResource extends Resource
{
    protected static ?string $model = InternationalService::class;
    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';
    protected static ?string $navigationGroup = 'Campus Life';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\TextInput::make('subtitle')->required(),
                
                Forms\Components\TextInput::make('icon')
                    ->default('fa-globe')
                    ->helperText('FontAwesome Class (e.g. fa-passport)'),
                
                Forms\Components\TagsInput::make('features')
                    ->placeholder('Press enter to add a feature')
                    ->columnSpanFull(),
                
                Forms\Components\Toggle::make('is_active')->default(true),
                Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('subtitle'),
                Tables\Columns\ToggleColumn::make('is_active'),
                Tables\Columns\TextInputColumn::make('sort_order')->sortable(),
            ])
            ->reorderable('sort_order')
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInternationalServices::route('/'),
            'create' => Pages\CreateInternationalService::route('/create'),
            'edit' => Pages\EditInternationalService::route('/{record}/edit'),
        ];
    }
}