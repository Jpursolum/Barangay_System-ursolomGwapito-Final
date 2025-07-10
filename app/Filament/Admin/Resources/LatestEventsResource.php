<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\LatestEventsResource\Pages;
use App\Models\LatestEvents;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LatestEventsResource extends Resource
{
    protected static ?string $model = LatestEvents::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Barangay News And Events';

    // protected static ?string $pluralModelLabel = 'Activities';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Event Title')
                    ->required(),

                Forms\Components\Textarea::make('description')
                    ->label('Event Description')
                    ->required(),

                Forms\Components\DatePicker::make('events_date')
                    ->label('Event Date')
                    ->required(),

                Forms\Components\TextInput::make('location')
                    ->label('Event Location')
                    ->required(),

                Forms\Components\TextInput::make('organizer')
                    ->label('Organizer')
                    ->required(),

                Forms\Components\TextInput::make('expected_attendees')
                    ->label('Expected Attendees')
                    ->numeric()
                    ->required(),

                Forms\Components\Textarea::make('attendees')
                    ->label('Attendees List')
                    ->rows(4)
                    ->placeholder('List of attendees'),

                Forms\Components\Toggle::make('published')
                    ->label('Publish Event'),

                Forms\Components\FileUpload::make('image')
                    ->label('Event Image')
                    ->disk('public')
                    ->directory('gallery_images')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->sortable()
                    ->searchable()
                    ->label('Event Title'),

                ImageColumn::make('image')
                    ->disk('public')
                    ->label('Event Image')
                    ->width(100)
                    ->height(100)
                    ->getStateUsing(function ($record) {
                        // Ensure the image path is constructed correctly
                        return $record->image ? asset('storage/gallery_images/'.$record->image) : null;
                    }),

                TextColumn::make('events_date')
                    ->label('Event Date')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('location')
                    ->label('Event Location')
                    ->sortable(),

                TextColumn::make('organizer')
                    ->label('Organizer')
                    ->sortable(),

                TextColumn::make('expected_attendees')
                    ->label('Expected Attendees')
                    ->sortable()
                    ->numeric(),

                BooleanColumn::make('published')
                    ->label('Published')
                    ->trueIcon('heroicon-o-check')  // Use the correct Heroicon for 'true'
                    ->falseIcon('heroicon-x')       // Use the correct Heroicon for 'false'
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime(),
            ])
            ->filters([
                // Add any filters if needed, e.g., by publication status or event date
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
            'index' => Pages\ListLatestEvents::route('/'),
            'create' => Pages\CreateLatestEvents::route('/create'),
            'edit' => Pages\EditLatestEvents::route('/{record}/edit'),
        ];
    }
}
