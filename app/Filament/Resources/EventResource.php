<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Concerns\Translatable;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class EventResource extends Resource
{
    use Translatable;

    protected static ?string $model = Event::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationGroup = 'News & Events';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Event Details')->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => 
                            $operation === 'create' ? $set('slug', Str::slug($state)) : null
                        ),
                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true),
                    
                    Forms\Components\Select::make('category')
                        ->options([
                            'academic' => 'Academic',
                            'cultural' => 'Cultural',
                            'sports' => 'Sports',
                            'social' => 'Social',
                        ])
                        ->required(),
                        
                    Forms\Components\RichEditor::make('description')
                        ->required()
                        ->columnSpanFull(),
                ])->columns(3),

                Forms\Components\Section::make('Date, Time & Location')->schema([
                    Forms\Components\DatePicker::make('start_date')
                        ->required(),
                    Forms\Components\DatePicker::make('end_date')
                        ->required()
                        ->afterOrEqual('start_date'),
                    Forms\Components\TextInput::make('time')
                        ->required()
                        ->placeholder('e.g. 9:00 AM - 2:00 PM'),
                    Forms\Components\TextInput::make('location')
                        ->required()
                        ->placeholder('e.g. Main Auditorium'),
                ])->columns(2),

                Forms\Components\Section::make('Event Schedule')->schema([
                    // Filament 3's simple repeater creates flat JSON arrays exactly how your DB expects them!
                    Forms\Components\Repeater::make('schedule')
                        ->simple(
                            Forms\Components\TextInput::make('item')->required()->placeholder('e.g. 8:30 AM — Guest Arrival')
                        )
                        ->columnSpanFull(),
                ]),

                Forms\Components\Section::make('Media & Status')->schema([
                    Forms\Components\FileUpload::make('thumbnail')
                        ->image()
                        ->directory('events')
                        ->required()
                        ->columnSpanFull(),
                    Forms\Components\Toggle::make('is_active')
                        ->default(true),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail'),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('category')->badge(),
                Tables\Columns\TextColumn::make('start_date')->date()->sortable(),
                Tables\Columns\ToggleColumn::make('is_active'),
            ])
            ->defaultSort('start_date', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'academic' => 'Academic',
                        'cultural' => 'Cultural',
                        'sports' => 'Sports',
                        'social' => 'Social',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}