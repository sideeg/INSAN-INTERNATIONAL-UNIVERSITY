<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentServiceResource\Pages;
use App\Models\StudentService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StudentServiceResource extends Resource
{
    protected static ?string $model = StudentService::class;
    protected static ?string $navigationIcon = 'heroicon-o-lifebuoy';
    protected static ?string $navigationGroup = 'Campus Life';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\TextInput::make('icon')
                    ->default('fa-info-circle')
                    ->helperText('FontAwesome Class (e.g. fa-laptop-code)'),
                
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                
                Forms\Components\TagsInput::make('features')
                    ->placeholder('Press enter to add a feature')
                    ->columnSpanFull(),
                
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('services')
                    ->columnSpanFull(),
                
                Forms\Components\Toggle::make('is_active')->default(true),
                Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('title')->searchable(),
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
            'index' => Pages\ListStudentServices::route('/'),
            'create' => Pages\CreateStudentService::route('/create'),
            'edit' => Pages\EditStudentService::route('/{record}/edit'),
        ];
    }
}