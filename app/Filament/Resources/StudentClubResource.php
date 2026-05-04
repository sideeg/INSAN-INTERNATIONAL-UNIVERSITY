<?php
namespace App\Filament\Resources;
use App\Filament\Resources\StudentClubResource\Pages;
use App\Models\StudentClub;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StudentClubResource extends Resource
{
    protected static ?string $model = StudentClub::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Campus Life';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\TextInput::make('icon')->default('fa-users')->helperText('FontAwesome Class'),
            Forms\Components\TextInput::make('member_count')->numeric()->default(0),
            Forms\Components\Toggle::make('is_active')->default(true),
            Forms\Components\Textarea::make('description')->required()->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')->searchable(),
            Tables\Columns\TextColumn::make('member_count')->sortable(),
            Tables\Columns\ToggleColumn::make('is_active'),
        ])->actions([Tables\Actions\EditAction::make()]);
    }
    public static function getPages(): array { return ['index' => Pages\ListStudentClubs::route('/'), 'create' => Pages\CreateStudentClub::route('/create'), 'edit' => Pages\EditStudentClub::route('/{record}/edit')]; }
}