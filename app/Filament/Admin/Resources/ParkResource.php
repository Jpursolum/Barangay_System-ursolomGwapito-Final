<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ParkResource\Pages;
use App\Models\Park;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ParkResource extends Resource
{
    protected static ?string $model = Park::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Visitors Lounge';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Name'),
                Textarea::make('description')
                    ->required()
                    ->label('Description'),
                FileUpload::make('image')
                    ->image()
                    ->label('Image'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Name')->sortable(),
                TextColumn::make('description')->label('Description')->limit(50),
                ImageColumn::make('image')->label('Image'),
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
            'index' => Pages\ListParks::route('/'),
            'create' => Pages\CreatePark::route('/create'),
            'edit' => Pages\EditPark::route('/{record}/edit'),
        ];
    }
}
