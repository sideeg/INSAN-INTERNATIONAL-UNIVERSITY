<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InternationalServiceResource\Pages;
use App\Filament\Resources\InternationalServiceResource\RelationManagers;
use App\Models\InternationalService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InternationalServiceResource extends Resource
{
    protected static ?string $model = InternationalService::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInternationalServices::route('/'),
            'create' => Pages\CreateInternationalService::route('/create'),
            'edit' => Pages\EditInternationalService::route('/{record}/edit'),
        ];
    }
}
