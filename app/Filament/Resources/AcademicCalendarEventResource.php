<?php
namespace App\Filament\Resources;
use App\Filament\Resources\AcademicCalendarEventResource\Pages;
use App\Models\AcademicCalendarEvent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AcademicCalendarEventResource extends Resource
{
    protected static ?string $model = AcademicCalendarEvent::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'University Settings';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('academic_year')->required()->placeholder('e.g. 2024/2025')->default(date('Y').'/'.(date('Y')+1)),
            Forms\Components\TextInput::make('name')->required(),
            
            Forms\Components\DatePicker::make('start_date')->required(),
            Forms\Components\DatePicker::make('end_date')->afterOrEqual('start_date'),
            
            Forms\Components\Select::make('category')->options([
                'admission' => 'Admissions',
                'academic' => 'Academic',
                'examination' => 'Examinations',
                'graduation' => 'Graduation',
                'holiday' => 'Holidays',
                'orientation' => 'Orientation',
                'other' => 'Other',
            ])->required(),
            
            Forms\Components\ColorPicker::make('color')->default('#1b1b18'),
            Forms\Components\Textarea::make('description')->columnSpanFull(),
            
            Forms\Components\Toggle::make('is_all_day')->default(true),
            Forms\Components\Toggle::make('is_published')->default(true),
            Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('academic_year')->sortable(),
            Tables\Columns\TextColumn::make('name')->searchable(),
            Tables\Columns\TextColumn::make('category')->badge(),
            Tables\Columns\TextColumn::make('start_date')->date()->sortable(),
            Tables\Columns\ToggleColumn::make('is_published'),
        ])->defaultSort('start_date', 'desc')->actions([Tables\Actions\EditAction::make()]);
    }
    public static function getPages(): array { return ['index' => Pages\ListAcademicCalendarEvents::route('/'), 'create' => Pages\CreateAcademicCalendarEvent::route('/create'), 'edit' => Pages\EditAcademicCalendarEvent::route('/{record}/edit')]; }
}