<?php

namespace App\Filament\Admin\Resources\BrgyHeadOfFamilyResource\RelationManagers;

use App\Models\BrgyInhabitant;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class FamilyMembersRelationManager extends RelationManager
{
    protected static string $relationship = 'familyMembers';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('firstname')
            ->columns([
                Tables\Columns\TextColumn::make('firstname')->label('First Name'),
                Tables\Columns\TextColumn::make('middlename')->label('Middle Name'),
                Tables\Columns\TextColumn::make('lastname')->label('Last Name'),
                Tables\Columns\TextColumn::make('positioninFamily')->label('Position in Family'),
                Tables\Columns\TextColumn::make('birthdate')->date()->label('Birthdate'),
                
                
            ])
            ->filters([])
            ->headerActions([]) // optional: disable Create
            ->actions([])
            ->bulkActions([]);
    }

    // 🛠 Override this method to return a proper Builder object!
    protected function getTableQuery(): Builder
    {
        return BrgyInhabitant::query()
            ->where('family_code', $this->ownerRecord->family_code)
            ->where('positioninFamily', '!=', 'Head of the family');
    }

    public function form(Form $form): Form
    {
        return $form->schema([]);
    }
}
