<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StaffProfileResource\Pages;
use App\Models\StaffProfile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Concerns\Translatable;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StaffProfileResource extends Resource
{
    use Translatable;

    protected static ?string $model = StaffProfile::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'About Us';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Personal Information')->schema([
                    Forms\Components\TextInput::make('name')->required(),
                    Forms\Components\TextInput::make('title')->required()->placeholder('e.g. Vice Chancellor'),
                    Forms\Components\Select::make('role_type')
                        ->options([
                            'vc' => 'Vice Chancellor',
                            'governance' => 'Governance / Council',
                            'leadership' => 'Leadership / Management',
                        ])->required(),
                    Forms\Components\TextInput::make('department'),
                    Forms\Components\TextInput::make('email')->email(),
                    Forms\Components\TextInput::make('phone')->tel(),
                ])->columns(2),

                Forms\Components\Section::make('Biography & Qualifications')->schema([
                    Forms\Components\TextInput::make('qualifications')
                        ->placeholder('e.g. PhD (University of London), MSc (Cairo University)')
                        ->columnSpanFull(),
                    Forms\Components\Textarea::make('bio')
                        ->rows(3)
                        ->columnSpanFull(),
                    Forms\Components\RichEditor::make('bio_extended')
                        ->columnSpanFull(),
                ]),

                Forms\Components\Section::make('Media & Status')->schema([
                    Forms\Components\FileUpload::make('portrait')
                        ->image()
                        ->directory('staff')
                        ->columnSpanFull(),
                    Forms\Components\Toggle::make('is_active')->default(true),
                    Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('portrait')->circular(),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('role_type')->badge(),
                Tables\Columns\ToggleColumn::make('is_active'),
                Tables\Columns\TextInputColumn::make('sort_order')->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(), // Automatically handles Soft Deletes!
                Tables\Filters\SelectFilter::make('role_type')
                    ->options([
                        'vc' => 'Vice Chancellor',
                        'governance' => 'Governance',
                        'leadership' => 'Leadership',
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
            'index' => Pages\ListStaffProfiles::route('/'),
            'create' => Pages\CreateStaffProfile::route('/create'),
            'edit' => Pages\EditStaffProfile::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}