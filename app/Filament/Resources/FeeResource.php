<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeeResource\Pages;
use App\Models\Fee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FeeResource extends Resource
{
    protected static ?string $model = Fee::class;
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationGroup = 'Admissions & Finance';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('fee_category_id')
                    ->relationship('category', 'name')
                    ->required()
                    ->preload()
                    ->searchable(),
                
                Forms\Components\TextInput::make('academic_year')
                    ->required()
                    ->placeholder('e.g. 2024/2025')
                    ->default(date('Y') . '/' . (date('Y') + 1)),

                Forms\Components\Select::make('programme_level')
                    ->options([
                        'Undergraduate' => 'Undergraduate',
                        'Postgraduate' => 'Postgraduate',
                        'Diploma' => 'Diploma',
                        'Certificate' => 'Certificate',
                        'All' => 'All Levels',
                    ])
                    ->required(),
                    
                Forms\Components\TextInput::make('programme_name')
                    ->placeholder('Leave empty if it applies to all programmes in this level'),

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Fee Line Item Name')
                    ->placeholder('e.g. Tuition Fee'),

                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->numeric()
                    ->prefix('UGX'),

                Forms\Components\Select::make('frequency')
                    ->options([
                        'per_semester' => 'Per Semester',
                        'per_year' => 'Per Year',
                        'once' => 'One-time',
                        'per_module' => 'Per Module',
                    ])
                    ->required()
                    ->default('per_year'),

                Forms\Components\TextInput::make('currency')
                    ->default('UGX')
                    ->required(),

                Forms\Components\Textarea::make('notes')
                    ->columnSpanFull(),

                Forms\Components\Toggle::make('is_active')->default(true),
                Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('academic_year')->sortable(),
                Tables\Columns\TextColumn::make('category.name')->sortable(),
                Tables\Columns\TextColumn::make('programme_level')->badge(),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('amount')->money('UGX')->sortable(),
                Tables\Columns\TextColumn::make('frequency'),
                Tables\Columns\ToggleColumn::make('is_active'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('fee_category_id')->relationship('category', 'name')->label('Category'),
                Tables\Filters\SelectFilter::make('academic_year'),
                Tables\Filters\SelectFilter::make('programme_level')->options([
                    'Undergraduate' => 'Undergraduate',
                    'Postgraduate' => 'Postgraduate',
                    'Diploma' => 'Diploma',
                    'Certificate' => 'Certificate',
                    'All' => 'All Levels',
                ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFees::route('/'),
            'create' => Pages\CreateFee::route('/create'),
            'edit' => Pages\EditFee::route('/{record}/edit'),
        ];
    }
}