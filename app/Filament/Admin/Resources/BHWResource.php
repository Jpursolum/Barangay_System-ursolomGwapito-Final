<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BHWResource\Pages;
use App\Models\BHW;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BHWResource extends Resource
{
    protected static ?string $model = BHW::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    protected static ?string $navigationGroup = 'Barangay Management';

    protected static ?string $pluralModelLabel = 'Barangay Health Worker';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Title'),
                Forms\Components\Textarea::make('designation')
                    ->label('designation '),
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
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBHWS::route('/'),
            'create' => Pages\CreateBHW::route('/create'),
            'edit' => Pages\EditBHW::route('/{record}/edit'),
        ];
    }
}
