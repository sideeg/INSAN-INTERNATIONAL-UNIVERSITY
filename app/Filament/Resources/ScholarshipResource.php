<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScholarshipResource\Pages;
use App\Models\Scholarship;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Concerns\Translatable;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ScholarshipResource extends Resource
{
    use Translatable;

    protected static ?string $model = Scholarship::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap'; // or heroicon-o-currency-dollar
    protected static ?string $navigationGroup = 'Admissions & Finance';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Details')->schema([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => 
                            $operation === 'create' ? $set('slug', Str::slug($state)) : null
                        ),
                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true),
                        
                    Forms\Components\TextInput::make('tagline')
                        ->columnSpanFull(),
                        
                    Forms\Components\RichEditor::make('overview')
                        ->required()
                        ->columnSpanFull(),
                ])->columns(2),

                Forms\Components\Section::make('Application Info')->schema([
                    Forms\Components\DatePicker::make('application_deadline'),
                    Forms\Components\TextInput::make('application_url')->url(),
                    Forms\Components\TextInput::make('duration')->placeholder('e.g. 3–4 years'),
                    Forms\Components\Textarea::make('application_process')->columnSpanFull(),
                    Forms\Components\Textarea::make('renewal_conditions')->columnSpanFull(),
                ])->columns(3),

                Forms\Components\Section::make('Lists (Press Enter to add items)')->schema([
                    Forms\Components\TagsInput::make('purposes'),
                    Forms\Components\TagsInput::make('benefits')->required(),
                    Forms\Components\TagsInput::make('eligibility_criteria')->required(),
                    Forms\Components\TagsInput::make('required_documents')->required(),
                    Forms\Components\TagsInput::make('impact_points'),
                ])->columns(2),

                Forms\Components\Section::make('Partner & Status')->schema([
                    Forms\Components\TextInput::make('partner_organisation'),
                    Forms\Components\FileUpload::make('partner_logo')
                        ->image()
                        ->directory('scholarships'),
                        
                    Forms\Components\Toggle::make('covers_full_tuition')->default(false),
                    Forms\Components\Toggle::make('is_active')->default(true),
                    Forms\Components\Toggle::make('is_featured')->default(false),
                    Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('application_deadline')->date()->sortable(),
                Tables\Columns\ToggleColumn::make('is_active'),
                Tables\Columns\ToggleColumn::make('is_featured'),
                Tables\Columns\TextInputColumn::make('sort_order')->sortable(),
            ])
            ->defaultSort('sort_order')
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->reorderable('sort_order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListScholarships::route('/'),
            'create' => Pages\CreateScholarship::route('/create'),
            'edit' => Pages\EditScholarship::route('/{record}/edit'),
        ];
    }
}