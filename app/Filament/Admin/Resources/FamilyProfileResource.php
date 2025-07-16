<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\FamilyProfileResource\Pages;
use App\Models\BrgyInhabitant;
use App\Models\FamilyProfile;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class FamilyProfileResource extends Resource
{
    protected static ?string $model = FamilyProfile::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Inhabitant Management';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('head_of_family')
                    ->label('Head of the Family')
                    ->options(
                        BrgyInhabitant::where('positioninFamily', 'Head of the family')
                            ->get()
                            ->mapWithKeys(fn ($inhabitant) => [$inhabitant->id => "{$inhabitant->firstname} {$inhabitant->lastname}"])
                    )
                    ->default(fn ($record) => $record?->head_of_family) // Set default for editing
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $inhabitant = BrgyInhabitant::find($state);
                        if ($inhabitant) {
                            $set('sex', $inhabitant->sex);
                            $set('age', $inhabitant->age);
                            $set('birthdate', $inhabitant->birthdate);
                            $set('civilstatus', $inhabitant->civilstatus);
                            $set('educAttainment', $inhabitant->educAttainment);
                            $set('occupation', $inhabitant->occupation);
                        }
                    }),

                Forms\Components\TextInput::make('sex'),
                Forms\Components\TextInput::make('age'),
                Forms\Components\TextInput::make('birthdate'),
                Forms\Components\TextInput::make('civilstatus'),
                Forms\Components\TextInput::make('educAttainment'),
                Forms\Components\TextInput::make('occupation'),
                Forms\Components\TextInput::make('religion'),
                Forms\Components\Select::make('monthlyincome')
                    ->label('Monthly Income')
                    ->required()
                    ->options([
                        'Below 10,000' => 'Below 10,000',
                        '10,000 - 20,000' => '10,000 - 20,000',
                        '20,000 - 30,000' => '20,000 - 30,000',
                        '30,000 - 40,000' => '30,000 - 40,000',
                        '40,000 - 50,000' => '40,000 - 50,000',
                        'Above 50,000' => 'Above 50,000',
                    ])
                    ->reactive(),
                
                    Forms\Components\Select::make('employment')
                    ->required()
                    ->options([
                        'Govt' => 'Govt',
                        'Private' => 'Private',
                        'Self Employed' => 'Self Employed',
                        'Un-Employed' => 'Un-Employed',
                        'Others' => 'Others',
                    ])
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $state) {
                        if ($state === 'Others') {
                            // If 'Others' is selected, set it as the selected occupation.
                            $set('employment', 'Others');
                        }
                    }),
                Forms\Components\TextInput::make('other_employment')
                    ->label('Please specify employment')
                    ->required()
                    ->maxLength(255)
                    ->visible(fn ($get) => $get('employment') === 'Others')
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $state) {
                        if ($state) {
                            // If 'other_occupation' is provided, set it as the value of occupation.
                            $set('employment', $state);
                        }
                    }),
                
                Forms\Components\Select::make('typeOfDwelling')
                    ->label('Type of Dwelling')
                    ->required()
                    ->options([
                        'Concrete House' => 'Concrete House',
                        'Wooden House' => 'Wooden House',
                        'Bamboo House' => 'Bamboo House',
                        'Nipa Hut' => 'Nipa Hut',
                        'Mixed Materials' => 'Mixed Materials',
                        'Apartment' => 'Apartment',
                        'Condominium' => 'Condominium',
                        'Shanty' => 'Shanty',
                    ])
                    ->reactive(),
                    Forms\Components\Select::make('watersource')
                    ->required()
                    ->options([
                        'Tap Water' => 'Tap Water',
                        'Well' => 'Well',
                        'Spring' => 'Spring',
                        'Rainwater' => 'Rainwater',
                        'Others' => 'Others',
                    ])
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $state) {
                        if ($state === 'Others') {
                            $set('watersource', 'Others');
                        }
                    }),
                Forms\Components\TextInput::make('other_watersource')
                    ->label('Please specify water source')
                    ->required()
                    ->maxLength(255)
                    ->visible(fn ($get) => $get('watersource') === 'Others')
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $state) {
                        if ($state) {
                            $set('watersource', $state);
                        }
                    }),
                
                Forms\Components\Select::make('toiletFacility')
                    ->required()
                    ->options([
                        'Flush Toilet' => 'Flush Toilet',
                        'Pit Latrine' => 'Pit Latrine',
                        'Composting Toilet' => 'Composting Toilet',
                        'Shared Facility' => 'Shared Facility',
                        'None' => 'None',
                        'Others' => 'Others',
                    ])
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $state) {
                        if ($state === 'Others') {
                            $set('toiletFacility', 'Others');
                        }
                    }),
                Forms\Components\TextInput::make('other_toiletFacility')
                    ->label('Please specify toilet facility')
                    ->required()
                    ->maxLength(255)
                    ->visible(fn ($get) => $get('toiletFacility') === 'Others')
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $state) {
                        if ($state) {
                            $set('toiletFacility', $state);
                        }
                    }),
                
                Forms\Components\Select::make('4ps')
                    ->label('4Ps (Pantawid Pamilyang Pilipino Program)')
                    ->required()
                    ->options([
                        'Yes' => 'Yes',
                        'No' => 'No',
                    ])
                    ->reactive(),

                Forms\Components\Select::make('houseMember')
                    ->label('Select Family Members')
                    ->multiple()
                    ->options(BrgyInhabitant::pluck('id', 'id')->toArray()) // Retrieve inhabitants' IDs
                    ->afterStateHydrated(function (Forms\Components\Select $component, $state) {
                        // Add "Select All" manually to the options
                        $component->options([
                            'select_all' => 'Select All',
                            ...BrgyInhabitant::get()->mapWithKeys(function ($inhabitant) {
                                return [$inhabitant->id => $inhabitant->firstname.' '.$inhabitant->lastname];
                            })->toArray(),
                        ]);
                    })
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $state) {
                        if (in_array('select_all', $state)) {
                            // Automatically select all Barangay Inhabitants if "Select All" is chosen
                            $set('houseMember', BrgyInhabitant::pluck('id')->toArray());
                        }
                    }),
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('User ID')
                    ->sortable(),

                // Display the head of the family
                Tables\Columns\TextColumn::make('headOfFamily.full_name')
                    ->label('Head of Family')
                    ->sortable()
                    ->searchable(),
                // Display the Family Members
                Tables\Columns\TextColumn::make('houseMember')
                    ->label('Family Members')
                    ->getStateUsing(function (FamilyProfile $record) {
                        // Check if houseMember field exists and is not empty
                        if (is_array($record->houseMember) || is_object($record->houseMember)) {
                            // Fetch the related Barangay Inhabitants and join their names
                            return BrgyInhabitant::whereIn('id', $record->houseMember)
                                ->get()
                                ->map(fn ($inhabitant) => "{$inhabitant->firstname} {$inhabitant->lastname}")
                                ->join(', ');
                        }

                        return '-'; // Default if no members are found
                    })
                    ->sortable()
                    ->searchable(),

                // Display the sex of the head of the family
                Tables\Columns\TextColumn::make('headOfFamily.sex')
                    ->label('Sex')
                    ->sortable()
                    ->searchable(),

                // Display the age of the head of the family
                Tables\Columns\TextColumn::make('headOfFamily.age')
                    ->label('Age')
                    ->sortable()
                    ->searchable(),

                // Display the birthdate of the head of the family
                Tables\Columns\TextColumn::make('headOfFamily.birthdate')
                    ->label('Birthdate')
                    ->date()
                    ->sortable()
                    ->searchable(),

                // Civil status
                Tables\Columns\TextColumn::make('headOfFamily.civilstatus')
                    ->label('Civil Status')
                    ->sortable()
                    ->searchable(),

                // Religion
                // Tables\Columns\TextColumn::make('headOfFamily.religion')
                //     ->label('Religion')
                //     ->sortable()
                //     ->searchable(),

                // Educational attainment
                Tables\Columns\TextColumn::make('headOfFamily.educAttainment')
                    ->label('Educational Attainment')
                    ->sortable()
                    ->searchable(),

                // Occupation
                Tables\Columns\TextColumn::make('headOfFamily.occupation')
                    ->label('Occupation')
                    ->sortable()
                    ->searchable(),

                // Occupation
                Tables\Columns\TextColumn::make('religion')
                    ->label('Religion')
                    ->sortable()
                    ->searchable(),

                // Monthly income
                Tables\Columns\TextColumn::make('monthlyincome')
                    ->label('Monthly Income')
                    ->sortable()
                    ->searchable(),


                    Tables\Columns\TextColumn::make('employment')
                    ->label('Employment')
                    ->sortable()
                    ->searchable(),

                // Type of dwelling
                Tables\Columns\TextColumn::make('typeOfDwelling')
                    ->label('Type of Dwelling')
                    ->sortable()
                    ->searchable(),

                // Water source
                Tables\Columns\TextColumn::make('watersource')
                    ->label('Water Source')
                    ->sortable()
                    ->searchable(),

                // Toilet facility
                Tables\Columns\TextColumn::make('toiletFacility')
                    ->label('Toilet Facility')
                    ->sortable()
                    ->searchable(),

                // 4Ps
                Tables\Columns\TextColumn::make('4ps')
                    ->label('4Ps')
                    ->sortable()
                    ->searchable(),

                // Approval status
                Tables\Columns\BooleanColumn::make('is_approved')
                    ->label('Approved')
                    ->sortable(),
            ])
            
            ->filters([
                Filter::make('Pending Approval')
                    ->query(fn (Builder $query) => $query->where('is_approved', false)),
                Filter::make('4Ps Members')
                    ->query(fn (Builder $query) => $query->where('4ps', 'Yes')),

                Filter::make('Monthly Income')
                    ->query(function (Builder $query, array $data) {
                        if (! empty($data['monthlyincome'])) {
                            $query->where('monthlyincome', $data['monthlyincome']);
                        }
                    })
                    ->form([
                        Forms\Components\Select::make('monthlyincome')
                            ->label('Monthly Income')
                            ->options([
                                'Below 10,000' => 'Below 10,000',
                                '10,000 - 20,000' => '10,000 - 20,000',
                                '20,000 - 30,000' => '20,000 - 30,000',
                                '30,000 - 40,000' => '30,000 - 40,000',
                                '40,000 - 50,000' => '40,000 - 50,000',
                                'Above 50,000' => 'Above 50,000',
                            ])
                            ->placeholder('Select Income Range'),
                    ]),
                      // Employment Filter
    Filter::make('Employment')
    ->query(function (Builder $query, array $data) {
        if (! empty($data['employment'])) {
            $query->where('employment', $data['employment']);
        }
    })
    ->form([
        Forms\Components\Select::make('employment')
            ->label('Employment')
            ->options([
                'Govt' => 'Govt',
                'Private' => 'Private',
                'Self Employed' => 'Self Employed',
                'Un-Employed' => 'Un-Employed',
                'Others' => 'Others',
            ])
            ->placeholder('All Employment Types'),
    ]),
     // Toilet Facility Filter
     Filter::make('Toilet Facility')
     ->query(function (Builder $query, array $data) {
         if (! empty($data['toiletFacility'])) {
             $query->where('toiletFacility', $data['toiletFacility']);
         }
     })
     ->form([
         Forms\Components\Select::make('toiletFacility')
             ->label('Toilet Facility')
             ->options([
                 'Flush Toilet' => 'Flush Toilet',
                 'Pit Latrine' => 'Pit Latrine',
                 'Composting Toilet' => 'Composting Toilet',
                 'Shared Facility' => 'Shared Facility',
                 'None' => 'None',
                 'Others' => 'Others',
             ])
             ->placeholder('All Facilities'),
     ]),
      // Water Source Filter
    Filter::make('Water Source')
    ->query(function (Builder $query, array $data) {
        if (! empty($data['watersource'])) {
            $query->where('watersource', $data['watersource']);
        }
    })
    ->form([
        Forms\Components\Select::make('watersource')
            ->label('Water Source')
            ->options([
                'Tap Water' => 'Tap Water',
                'Well' => 'Well',
                'Spring' => 'Spring',
                'Rainwater' => 'Rainwater',
                'Others' => 'Others',
            ])
            ->placeholder('All Water Sources'),
    ]),

                // Filtering for Type of Dwelling
                Filter::make('Type of Dwelling')
                    ->query(function (Builder $query, array $data) {
                        if (! empty($data['typeOfDwelling'])) {
                            $query->where('typeOfDwelling', $data['typeOfDwelling']);
                        }
                    })
                    ->form([
                        Forms\Components\Select::make('typeOfDwelling')
                            ->label('Type of Dwelling')
                            ->options([
                                'Concrete House' => 'Concrete House',
                                'Wooden House' => 'Wooden House',
                                'Bamboo House' => 'Bamboo House',
                                'Nipa Hut' => 'Nipa Hut',
                                'Mixed Materials' => 'Mixed Materials',
                                'Apartment' => 'Apartment',
                                'Condominium' => 'Condominium',
                                'Shanty' => 'Shanty',
                                'Other' => 'Other',
                            ])
                            ->placeholder('All Types'),
                    ]),

            ])
            ->actions([
                Action::make('approve')
                    ->label('Approve')
                    ->action(function (FamilyProfile $record) {
                        $record->is_approved = true;
                        $record->save();
                    })
                    ->visible(fn (FamilyProfile $record) => Filament::auth()->user() && (Filament::auth()->user()->hasRole('super_admin') || Filament::auth()->user()->hasRole('brgySecretary')) && ! $record->is_approved),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        if (auth()->user()->hasRole('super_admin') || auth()->user()->hasRole('brgySecretary')) {
            return parent::getEloquentQuery();
        }

        return parent::getEloquentQuery()->where('user_id', auth()->id());
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
            'index' => Pages\ListFamilyProfiles::route('/'),
            'create' => Pages\CreateFamilyProfile::route('/create'),
            'edit' => Pages\EditFamilyProfile::route('/{record}/edit'),
        ];
    }
}
