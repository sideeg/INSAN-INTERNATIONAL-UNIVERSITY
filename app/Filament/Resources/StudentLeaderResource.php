<?php
namespace App\Filament\Resources;
use App\Filament\Resources\StudentLeaderResource\Pages;
use App\Models\StudentLeader;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StudentLeaderResource extends Resource
{
    protected static ?string $model = StudentLeader::class;
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Campus Life';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\TextInput::make('role')->required(),
            Forms\Components\TextInput::make('year')->required()->placeholder('e.g. 2024/2025'),
            Forms\Components\TextInput::make('email')->email(),
            Forms\Components\TextInput::make('linkedin_url')->url(),
            Forms\Components\FileUpload::make('photo')->image()->directory('leaders')->columnSpanFull(),
            Forms\Components\Toggle::make('is_council')->label('Is SRC Member?')->default(false),
            Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('photo')->circular(),
            Tables\Columns\TextColumn::make('name')->searchable(),
            Tables\Columns\TextColumn::make('role')->searchable(),
            Tables\Columns\ToggleColumn::make('is_council'),
            Tables\Columns\TextInputColumn::make('sort_order')->sortable(),
        ])->reorderable('sort_order')->actions([Tables\Actions\EditAction::make()]);
    }
    public static function getPages(): array { return ['index' => Pages\ListStudentLeaders::route('/'), 'create' => Pages\CreateStudentLeader::route('/create'), 'edit' => Pages\EditStudentLeader::route('/{record}/edit')]; }
}