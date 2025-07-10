<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Administration';

    public static function shouldRegisterNavigation(): bool
    {
        // Allow both 'admin' and 'brgy secretary' to see the resource
        return auth()->user()->hasAnyRole(['super_admin', 'brgySecretary']) || auth()->user()->can('view events');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\Textarea::make('description')->required(),
                Forms\Components\DatePicker::make('event_date')->required(),
                Forms\Components\TextInput::make('location')->required(),
                Forms\Components\TextInput::make('organizer')  // Organizer Field
                    ->label('Organizer')
                    ->required(),
                Forms\Components\TextInput::make('expected_attendees')  // Expected Attendees Field
                    ->label('Expected Attendees')
                    ->numeric()
                    ->required(),
                Forms\Components\Textarea::make('attendees')  // Attendees List Field
                    ->label('Attendees')
                    ->rows(4)
                    ->placeholder('List of attendees'),
                Forms\Components\Toggle::make('published')->label('Publish Event'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('description')->limit(50),
                TextColumn::make('event_date')->sortable(),
                TextColumn::make('location')->label('Location'),  // Location Column
                TextColumn::make('organizer')->label('Organizer')->sortable()->searchable(),  // Organizer Column
                TextColumn::make('expected_attendees')->label('Expected Attendees')->sortable(),  // Expected Attendees Column
                BooleanColumn::make('published')->label('Published'),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
