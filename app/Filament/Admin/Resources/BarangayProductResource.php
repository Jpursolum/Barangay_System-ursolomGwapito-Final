<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BarangayProductResource\Pages;
use App\Models\BarangayProduct;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BarangayProductResource extends Resource
{
    protected static ?string $model = BarangayProduct::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->label('Image')
                    ->directory('barangayproduct_images'),

                Forms\Components\FileUpload::make('media_path')
                    ->label('Media File (Image or Video)')
                    ->directory('barangayproduct_media')
                    ->acceptedFileTypes(['image/*', 'video/*']),

                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->required()
                    ->label('Price')
                    ->minValue(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),

                Tables\Columns\ImageColumn::make('image')
                    ->label('Image'),

                Tables\Columns\TextColumn::make('media_path')
                    ->label('Media Path')
                    ->searchable(),

                Tables\Columns\TextColumn::make('price')
                    ->money('PHP', true) // Adjust currency format if needed
                    ->sortable(),

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
                // Add any table filters here if needed
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
            'index' => Pages\ListBarangayProducts::route('/'),
            'create' => Pages\CreateBarangayProduct::route('/create'),
            'edit' => Pages\EditBarangayProduct::route('/{record}/edit'),
        ];
    }
}
