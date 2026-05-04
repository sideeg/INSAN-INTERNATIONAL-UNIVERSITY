<?php
namespace App\Filament\Resources;
use App\Filament\Resources\CountryResource\Pages;
use App\Models\Country;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CountryResource extends Resource
{
    protected static ?string $model = Country::class;
    protected static ?string $navigationIcon = 'heroicon-o-flag';
    protected static ?string $navigationGroup = 'Campus Life';
    protected static ?string $modelLabel = 'International Country';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\TextInput::make('code')->required()->maxLength(2)->placeholder('e.g. SD, UG'),
            Forms\Components\TextInput::make('flag_emoji')->required()->placeholder('e.g. 🇸🇩'),
            Forms\Components\TextInput::make('student_count')->numeric()->default(0),
            Forms\Components\Toggle::make('is_represented')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('flag_emoji')->size(Tables\Columns\TextColumn\TextColumnSize::Large),
            Tables\Columns\TextColumn::make('name')->searchable(),
            Tables\Columns\TextColumn::make('student_count')->sortable(),
            Tables\Columns\ToggleColumn::make('is_represented'),
        ])->actions([Tables\Actions\EditAction::make()]);
    }
    public static function getPages(): array { return ['index' => Pages\ListCountries::route('/'), 'create' => Pages\CreateCountry::route('/create'), 'edit' => Pages\EditCountry::route('/{record}/edit')]; }
}