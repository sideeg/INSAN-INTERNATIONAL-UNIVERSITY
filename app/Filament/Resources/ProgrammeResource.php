<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgrammeResource\Pages;
use App\Models\Programme;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Concerns\Translatable;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProgrammeResource extends Resource
{
    // THIS ENABLES SPATIE TRANSLATABLE FOR THE RESOURCE
    use Translatable; 

    protected static ?string $model = Programme::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Academics';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => 
                            $operation === 'create' ? $set('slug', Str::slug($state)) : null
                        ),
                        
                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true),

                    Forms\Components\RichEditor::make('description')
                        ->required()
                        ->columnSpanFull(),
                ])->columns(2),

                Forms\Components\Section::make('Programme Details')->schema([
                    Forms\Components\Select::make('category')
                        ->options([
                            'undergraduate' => 'Undergraduate',
                            'graduate' => 'Graduate',
                            'continuing' => 'Continuing Education',
                        ])->required(),
                        
                    Forms\Components\TextInput::make('type')->required()->placeholder('e.g. BSc (Hons)'),
                    Forms\Components\TextInput::make('badge')->required()->placeholder('e.g. BA (Hons)'),
                    Forms\Components\TextInput::make('duration')->required()->placeholder('e.g. 4 Years (8 Semesters)'),
                    Forms\Components\TextInput::make('credits')->required()->placeholder('e.g. 140 Credits'),
                    Forms\Components\TextInput::make('intake')->required()->placeholder('e.g. September & February'),
                    Forms\Components\TextInput::make('icon')->default('fa-graduation-cap')->helperText('FontAwesome class (e.g. fa-laptop-code)'),
                ])->columns(3),

                Forms\Components\Section::make('Lists & Arrays')->schema([
                    // Requirements and Modules are stored as JSON arrays in your DB
                    Forms\Components\TagsInput::make('requirements')
                        ->placeholder('Type requirement and press enter')
                        ->columnSpanFull(),
                        
                    Forms\Components\TagsInput::make('modules')
                        ->placeholder('Type module and press enter')
                        ->columnSpanFull(),
                ]),

                Forms\Components\Section::make('Fees Structure')->schema([
                    // Fees are stored as an array of key-value pairs
                    Forms\Components\Repeater::make('fees')
                        ->schema([
                            Forms\Components\TextInput::make('label')->required()->placeholder('e.g. Tuition per Semester'),
                            Forms\Components\TextInput::make('value')->required()->placeholder('e.g. $2,500 USD'),
                        ])
                        ->columns(2)
                        ->columnSpanFull(),
                ]),

                Forms\Components\Section::make('Media & Status')->schema([
                    Forms\Components\FileUpload::make('thumbnail')
                        ->image()
                        ->directory('programmes')
                        ->columnSpanFull(),
                        
                    Forms\Components\Toggle::make('is_active')
                        ->default(true),
                        
                    Forms\Components\TextInput::make('sort_order')
                        ->numeric()
                        ->default(0),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail'),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'undergraduate' => 'info',
                        'graduate' => 'success',
                        'continuing' => 'warning',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('type')->searchable(),
                Tables\Columns\ToggleColumn::make('is_active'),
                Tables\Columns\TextInputColumn::make('sort_order')->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'undergraduate' => 'Undergraduate',
                        'graduate' => 'Graduate',
                        'continuing' => 'Continuing Education',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->reorderable('sort_order'); // Enables Drag & Drop sorting!
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProgrammes::route('/'),
            'create' => Pages\CreateProgramme::route('/create'),
            'edit' => Pages\EditProgramme::route('/{record}/edit'),
        ];
    }
}