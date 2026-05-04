<?php
namespace App\Filament\Resources;
use App\Filament\Resources\NewsletterSubscriberResource\Pages;
use App\Models\NewsletterSubscriber;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class NewsletterSubscriberResource extends Resource
{
    protected static ?string $model = NewsletterSubscriber::class;
    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationGroup = 'Marketing';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('email')->email()->required()->unique(ignoreRecord: true),
            Forms\Components\DateTimePicker::make('subscribed_at')->default(now())->required(),
            Forms\Components\TextInput::make('ip_address')->disabled(),
            Forms\Components\Toggle::make('is_active')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('email')->searchable(),
            Tables\Columns\TextColumn::make('subscribed_at')->dateTime()->sortable(),
            Tables\Columns\TextColumn::make('ip_address'),
            Tables\Columns\ToggleColumn::make('is_active'),
        ])->actions([Tables\Actions\EditAction::make()]);
    }
    public static function getPages(): array { return ['index' => Pages\ListNewsletterSubscribers::route('/'), 'create' => Pages\CreateNewsletterSubscriber::route('/create'), 'edit' => Pages\EditNewsletterSubscriber::route('/{record}/edit')]; }
}