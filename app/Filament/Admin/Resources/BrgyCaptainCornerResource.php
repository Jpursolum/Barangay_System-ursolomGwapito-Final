<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BrgyCaptainCornerResource\Pages;
use App\Models\BrgyCaptainCorner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BrgyCaptainCornerResource extends Resource
{
    protected static ?string $model = BrgyCaptainCorner::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Barangay Chairperson Corner';

    protected static ?string $pluralModelLabel = 'Barangay Chairperson ';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->label('Image')
                    ->image(),
                Forms\Components\Textarea::make('message')
                    ->label('Message')
                    ->required(),
                Forms\Components\TextInput::make('video_link')
                    ->label('Video Link')
                    ->url()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\ImageColumn::make('image')->label('Image'),
                Tables\Columns\TextColumn::make('message')->limit(50),
                Tables\Columns\TextColumn::make('created_at')->label('Created At')->date(),
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
            'index' => Pages\ListBrgyCaptainCorners::route('/'),
            'create' => Pages\CreateBrgyCaptainCorner::route('/create'),
            'edit' => Pages\EditBrgyCaptainCorner::route('/{record}/edit'),
        ];
    }
}
