<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BrangayOfficialsResource\Pages;
use App\Models\BrangayOfficials; // "Brangay" as requested
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class BrangayOfficialsResource extends Resource // "Brangay" as requested
{
    protected static ?string $model = BrangayOfficials::class; // "Brangay" as requested

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administration';

    protected static ?string $pluralModelLabel = 'Barangay Officials';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Enter Full Name'),

                // Select Dropdown for Designation
                Forms\Components\Select::make('designation')
                    ->required()
                    ->label('Designation')
                    ->options([
                        'Chairperson' => 'Chairperson',
                        'Secretary' => 'Secretary',
                        'Treasurer' => 'Treasurer',
                        'Councilor' => 'Councilor',
                        'Chairman' => 'Chairman',
                        'Barangay Tanod' => 'Barangay Tanod',
                        'Book Keeper' => 'Book Keeper',
                    ])
                    ->placeholder('Select Designation')
                    ->columnSpanFull(),

                // Image is optional for faster form filling
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->label('Official Image')
                    ->nullable(),

                // Term year selection
                Forms\Components\Select::make('term_year')
                    ->required()
                    ->label('Term Year')
                    ->options([
                        '2016 to 2018' => '2016 to 2018',
                        '2018 to 2021' => '2018 to 2021',
                        '2023 to 2026' => '2023 to 2026',
                    ])
                    ->default('2023 to 2026'), // Set default value to '2023 to 2026'
            ]);
    }

    // Handle the form submission
    public static function saved($record): void
    {
        // No additional designation logic, just save the record as it is
        $record->save();  // Ensure the record is saved
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('term_year')
                    ->label('Term Year')
                    ->searchable(),
                Tables\Columns\TextColumn::make('designation') // Display the designation here
                    ->label('Designation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('term_year')
                    ->label('Term Year')
                    ->options([
                        '2016 to 2018' => '2016 to 2018',
                        '2018 to 2021' => '2018 to 2021',
                        '2023 to 2026' => '2023 to 2026',
                    ])
                    ->default('2023 to 2026'),  // Default value for the filter
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(), // Option to delete quickly
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
            // Define relations if necessary, like related models for officials
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBrangayOfficials::route('/'),
            'create' => Pages\CreateBrangayOfficials::route('/create'),  // This is your 'Create' page
            'edit' => Pages\EditBrangayOfficials::route('/{record}/edit'),
        ];
    }
}
