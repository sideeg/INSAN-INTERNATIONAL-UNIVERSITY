<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GraduationEventResource\Pages;
use App\Models\GraduationEvent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GraduationEventResource extends Resource
{
    protected static ?string $model = GraduationEvent::class;
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $navigationGroup = 'About Us';
    protected static ?string $modelLabel = 'Convocation / Graduation';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Event Basics')->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => 
                            $operation === 'create' ? $set('slug', Str::slug($state)) : null
                        ),
                    Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),
                    Forms\Components\Select::make('type')
                        ->options([
                            'convocation' => 'Main Convocation Ceremony',
                            'announcement' => 'Upcoming Announcement',
                            'alumni' => 'Alumni Spotlight',
                        ])->required()->default('convocation'),
                    Forms\Components\TextInput::make('convocation_number')->numeric()->label('Convocation Number (e.g. 1 for 1st)'),
                    Forms\Components\DatePicker::make('ceremony_date'),
                    Forms\Components\TextInput::make('venue'),
                    Forms\Components\RichEditor::make('description')->columnSpanFull(),
                ])->columns(2),

                Forms\Components\Section::make('Statistics & Links')->schema([
                    Forms\Components\TextInput::make('graduates_count')->numeric(),
                    Forms\Components\TextInput::make('keynote_speaker'),
                    Forms\Components\TextInput::make('programme_booklet_url')->url()->label('PDF Booklet URL'),
                    Forms\Components\TextInput::make('live_stream_url')->url()->label('Live Stream URL'),
                ])->columns(2),

                Forms\Components\Section::make('Images & Media')->schema([
                    Forms\Components\FileUpload::make('cover_image')
                        ->image()
                        ->directory('graduations/covers')
                        ->columnSpanFull(),
                        
                    // FILAMENT AUTOMATICALLY HANDLES THE JSON ARRAY UPLOAD!
                    Forms\Components\FileUpload::make('gallery_images')
                        ->image()
                        ->multiple()
                        ->directory('graduations/gallery')
                        ->reorderable()
                        ->appendFiles()
                        ->columnSpanFull(),
                ]),

                Forms\Components\Section::make('Visibility')->schema([
                    Forms\Components\Toggle::make('is_published')->default(false),
                    Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_image'),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('type')->badge(),
                Tables\Columns\TextColumn::make('ceremony_date')->date(),
                Tables\Columns\ToggleColumn::make('is_published'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'convocation' => 'Convocation',
                        'announcement' => 'Announcement',
                        'alumni' => 'Alumni',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\RestoreAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGraduationEvents::route('/'),
            'create' => Pages\CreateGraduationEvent::route('/create'),
            'edit' => Pages\EditGraduationEvent::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScopes([SoftDeletingScope::class]);
    }
}