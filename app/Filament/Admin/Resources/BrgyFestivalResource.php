<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BrgyFestivalResource\Pages;
use App\Models\BrgyFestival;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BrgyFestivalResource extends Resource
{
    protected static ?string $model = BrgyFestival::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Community Management';

    protected static ?string $pluralModelLabel = 'Festivals';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->label('Title'),
                Forms\Components\Textarea::make('description')
                    ->label('Description'),
                Forms\Components\FileUpload::make('image')
                    ->label('Image')
                    ->disk('public')
                    ->directory('gallery_images')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable()->searchable(),
                Tables\Columns\ImageColumn::make('image')->disk('public'),
                Tables\Columns\TextColumn::make('created_at')->label('Created')->dateTime(),
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

    public static function canViewAny(): bool
    {
        return auth()->user()?->hasAnyRole(['super_admin', 'brgySecretary']); // Replace with roles allowed to view this resource
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBrgyFestivals::route('/'),
            'create' => Pages\CreateBrgyFestival::route('/create'),
            'edit' => Pages\EditBrgyFestival::route('/{record}/edit'),
        ];
    }
}
