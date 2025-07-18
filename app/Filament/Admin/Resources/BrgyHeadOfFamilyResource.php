<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BrgyHeadOfFamilyResource\Pages;
use App\Filament\Admin\Resources\BrgyHeadOfFamilyResource\RelationManagers\FamilyMembersRelationManager;
use App\Models\BrgyInhabitant;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class BrgyHeadOfFamilyResource extends Resource
{
    protected static ?string $model = BrgyInhabitant::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Records of Barangay Head of Family';

    protected static ?string $pluralModelLabel = 'Barangay Head of the Family';

    protected static ?string $navigationGroup = 'Inhabitant Management';

    // Only super_admin and brgySecretary can see this in the sidebar
    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->hasAnyRole(['super_admin', 'brgySecretary']);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('lastname')->disabled(),
                Forms\Components\TextInput::make('firstname')->disabled(),
                Forms\Components\TextInput::make('middlename')->disabled(),
                Forms\Components\TextInput::make('family_code')->disabled(),
                Forms\Components\TextInput::make('monthlyincome')->disabled(),
                Forms\Components\TextInput::make('religion')->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('lastname')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('firstname')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('middlename')->sortable(),
                Tables\Columns\TextColumn::make('family_code')->label('Family Code')->searchable(),
                Tables\Columns\TextColumn::make('monthlyincome')->label('Monthly Income'),
                Tables\Columns\TextColumn::make('religion')->label('Religion'),
                Tables\Columns\TextColumn::make('purok')->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('Purok')
                    ->form([
                        Forms\Components\Select::make('purok')
                            ->options([
                                'Purok 1' => 'Purok 1',
                                'Purok 2' => 'Purok 2',
                                'Purok 3' => 'Purok 3',
                                'Purok 4' => 'Purok 4',
                                'Purok 5' => 'Purok 5',
                                'Purok 6' => 'Purok 6',
                                'Others' => 'Others',
                            ])
                            ->placeholder('Select Purok'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (! empty($data['purok'])) {
                            $query->where('purok', $data['purok']);
                        }
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(), // only view button shown
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('positioninFamily', 'Head of the family');
    }

    public static function getRelations(): array
    {
        return [
            FamilyMembersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBrgyHeadOfFamilies::route('/'),
            'view' => Pages\ViewBrgyHeadOfFamily::route('/{record}'),
        ];
    }
}
