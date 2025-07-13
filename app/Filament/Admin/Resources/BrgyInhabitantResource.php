<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BrgyInhabitantResource\Pages;
use App\Models\BrgyInhabitant;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Tabs;


class BrgyInhabitantResource extends Resource
{
    protected static ?string $model = BrgyInhabitant::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Inhabitants';

     public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                // Basic Inhabitant Fields (as before)
                Forms\Components\Hidden::make('user_id')->default(auth()->id()),

                Forms\Components\TextInput::make('lastname')->required()->maxLength(255),
                Forms\Components\TextInput::make('firstname')->required()->maxLength(255),
                Forms\Components\TextInput::make('middlename')->label('Middlename (optional)')->maxLength(255),
                Forms\Components\TextInput::make('extensionName')->label('Extension Name (optional)')->maxLength(255),
                Forms\Components\DatePicker::make('birthdate')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $state) {
                        if ($state) {
                            try {
                                $age = intval(\Carbon\Carbon::parse($state)->diffInYears(now()));
                                $set('age', $age);
                            } catch (\Exception $e) {
                                $set('age', null);
                            }
                        } else {
                            $set('age', null);
                        }
                    }),


                Forms\Components\TextInput::make('age')
                    ->numeric()
                    ->label('Age')
                    ->disabled()
                    ->dehydrated(true) // ← para di isave sa DB kung di kailangan
    ->reactive(),       // ← para mag-refresh agad


                Forms\Components\TextInput::make('purok')->required()->maxLength(255),
                Forms\Components\TextInput::make('placeofbirth')->required()->maxLength(255),

                Forms\Components\Select::make('sex')->required()->options(['Male' => 'Male', 'Female' => 'Female']),
                Forms\Components\Select::make('civilstatus')->required()->options([
                    'Single' => 'Single', 'Married' => 'Married', 'Widowed' => 'Widowed',
                    'Separated' => 'Separated', 'Annulled' => 'Annulled', 'Live-in' => 'Live-in'
                ]),

                Forms\Components\Select::make('positioninFamily')
                    ->label('Position in Family')
                    ->required()
                    ->options([
                        'Head of the family' => 'Head of the family', 'Wife' => 'Wife', 'Husband' => 'Husband',
                        'Son' => 'Son', 'Daughter' => 'Daughter', 'Father' => 'Father', 'Mother' => 'Mother',
                        'Grandfather' => 'Grandfather', 'Grandmother' => 'Grandmother',
                    ])
                    ->reactive(),

                Forms\Components\Select::make('citizenship')->required()
                    ->options(['Filipino' => 'Filipino', 'Others' => 'Others'])
                    ->default('Filipino')
                    ->reactive()
                    ->afterStateUpdated(fn ($set, $state) => $state === 'Others' ? $set('citizenship', 'Others') : null),

                Forms\Components\TextInput::make('other_citizenship')
                    ->label('Please specify citizenship')
                    ->required()
                    ->visible(fn ($get) => $get('citizenship') === 'Others'),

                Forms\Components\Select::make('educAttainment')->required()->options([
                    'No Formal Education', 'Elementary', 'High School', 'Vocational',
                    'Undergraduate', 'Graduate', 'Postgraduate', 'Others'
                ])->reactive(),

                Forms\Components\TextInput::make('other_educationalAtt')
                    ->label('Please specify Attainment')
                    ->required()
                    ->visible(fn ($get) => $get('educAttainment') === 'Others'),

                Forms\Components\TextInput::make('occupation')->required()->maxLength(255),



                Forms\Components\Select::make('ofw')->required()->options(['Yes' => 'Yes', 'No' => 'No']),
                Forms\Components\Select::make('pwd')->required()->options(['Yes' => 'Yes', 'No' => 'No']),
                Forms\Components\Select::make('registeredVoters')->required()->options(['Yes' => 'Yes', 'No' => 'No']),
                Forms\Components\Select::make('IPmember')->label('IP member')->required()->options(['Yes' => 'Yes', 'No' => 'No']),

                Forms\Components\TextInput::make('email')->label('Active Email Account')->email()->required(),

                // 👇👇👇 FAMILY PROFILE FIELDS (Only for Head of Family)
                Forms\Components\Section::make('Family Profile Details')
                    ->visible(fn ($get) => $get('positioninFamily') === 'Head of the family')
                    ->schema([
                        Forms\Components\TextInput::make('religion')->label('Religion'),
                Forms\Components\Select::make('livestock')->required()
                    ->options([
                        'Chickens', 'Ducks', 'Pigs', 'Cattle', 'Goats', 'Carabaos',
                        'Tilapia', 'Bangus (Milkfish)', 'Others'
                    ])->reactive(),

                Forms\Components\TextInput::make('other_livestock')
                    ->label('Please specify livestock')
                    ->required()
                    ->visible(fn ($get) => $get('livestock') === 'Others'),
                        Forms\Components\Select::make('monthlyincome')->label('Monthly Income')->required()->options([
                            'Below 10,000', '10,000 - 20,000', '20,000 - 30,000', '30,000 - 40,000',
                            '40,000 - 50,000', 'Above 50,000'
                        ]),

                        Forms\Components\Select::make('employment')->label('Employment')->required()->options([
                            'Govt', 'Private', 'Self Employed', 'Un-Employed', 'Others'
                        ])->reactive(),

                        Forms\Components\TextInput::make('other_employment')->label('Specify Employment')
                            ->required()
                            ->visible(fn ($get) => $get('employment') === 'Others'),

                        Forms\Components\Select::make('typeOfDwelling')->label('Type of Dwelling')->required()->options([
                            'Concrete House', 'Wooden House', 'Bamboo House', 'Nipa Hut', 'Mixed Materials',
                            'Apartment', 'Condominium', 'Shanty'
                        ]),

                        Forms\Components\Select::make('watersource')->label('Water Source')->required()->options([
                            'Tap Water', 'Well', 'Spring', 'Rainwater', 'Others'
                        ])->reactive(),

                        Forms\Components\TextInput::make('other_watersource')->label('Specify Water Source')
                            ->required()
                            ->visible(fn ($get) => $get('watersource') === 'Others'),

                        Forms\Components\Select::make('toiletFacility')->label('Toilet Facility')->required()->options([
                            'Flush Toilet', 'Pit Latrine', 'Composting Toilet', 'Shared Facility', 'None', 'Others'
                        ])->reactive(),

                        Forms\Components\TextInput::make('other_toiletFacility')->label('Specify Toilet Facility')
                            ->required()
                            ->visible(fn ($get) => $get('toiletFacility') === 'Others'),

                        Forms\Components\Select::make('4ps')->label('4Ps (Pantawid Pamilya)')->required()->options([
                            'Yes' => 'Yes', 'No' => 'No'
                        ]),
                        Forms\Components\Select::make('houseMembers')
                        ->label('Select Family Members')
                        ->multiple()
                        ->options(
                            fn () => \App\Models\BrgyInhabitant::all()
                                ->pluck('full_name', 'id') // make sure you have accessor in model
                        )
                        ->visible(fn ($get) => $get('positioninFamily') === 'Head of the family')
                        ->reactive()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if (in_array('select_all', $state)) {
                                $set('houseMembers', \App\Models\BrgyInhabitant::pluck('id')->toArray());
                            }
                        })
                        ->afterStateHydrated(function (Forms\Components\Select $component, $state) {
                            $inhabitants = \App\Models\BrgyInhabitant::all();
                            $component->options([
                                'select_all' => 'Select All',
                                ...$inhabitants->mapWithKeys(fn ($inhabitant) => [$inhabitant->id => "{$inhabitant->firstname} {$inhabitant->lastname}"])->toArray(),
                            ]);
                        }),

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('lastname')->searchable(),
                Tables\Columns\TextColumn::make('firstname')->searchable(),
                Tables\Columns\TextColumn::make('middlename')->searchable(),
                Tables\Columns\TextColumn::make('extensionName')->searchable(),
                Tables\Columns\TextColumn::make('age')->searchable(),
                Tables\Columns\TextColumn::make('birthdate')->date()->sortable(),
                Tables\Columns\TextColumn::make('purok')->searchable(),
                Tables\Columns\TextColumn::make('placeofbirth')->searchable(),
                Tables\Columns\TextColumn::make('sex')->searchable(),
                Tables\Columns\TextColumn::make('civilstatus')   ->searchable(),
                Tables\Columns\TextColumn::make('positioninFamily')->searchable(),
                Tables\Columns\TextColumn::make('citizenship')->searchable(),
                Tables\Columns\TextColumn::make('educAttainment')->searchable(),
                Tables\Columns\TextColumn::make('occupation')->searchable(),
                Tables\Columns\TextColumn::make('livestock')->searchable(),
                Tables\Columns\TextColumn::make('IPmember')->searchable(),
                
                Tables\Columns\TextColumn::make('ofw')->searchable(),
                Tables\Columns\TextColumn::make('pwd')->label('Pwd')->searchable(),
                Tables\Columns\TextColumn::make('registeredVoters')->label('Registered Voters')->searchable(),
                Tables\Columns\TextColumn::make('email')->label('Active Email Account')->searchable(),
                BooleanColumn::make('is_approved')->label('Approved')->sortable(),
            ])
            ->filters([
                Filter::make('Inhabitant Status')
                    ->query(function (Builder $query, array $data) {
                        if (isset($data['status']) && $data['status'] === 'pending') {
                            $query->where('is_approved', false);
                        } elseif (isset($data['status']) && $data['status'] === 'approved') {
                            $query->where('is_approved', true);
                        }
                    })
                    ->form([
                        Forms\Components\Select::make('status')
                            ->label('Inhabitant Status')
                            ->options([
                                'pending' => 'Pending Approval',
                                'approved' => 'Approved Only',
                            ])
                            ->placeholder('Select Inhabitant Status'),
                    ])
                    ->label('Filter by Inhabitant Status'),

                Filter::make('pwd')
                    ->query(fn (Builder $query) => $query->where('pwd', 'Yes')),
                Filter::make('ofw')
                    ->query(fn (Builder $query) => $query->where('ofw', 'Yes')),
                Filter::make('Senior Citizens')
                    ->label('Age 60 and Above')
                    ->query(fn (Builder $query) => $query->where('age', '>=', 60)),
                // Custom Age Range Filter
                Filter::make('Age Range')
                    ->form([
                        Forms\Components\TextInput::make('min_age')
                            ->label('Min Age')
                            ->numeric()
                            ->maxLength(3)
                            ->placeholder('e.g. 15'),
                        Forms\Components\TextInput::make('max_age')
                            ->label('Max Age')
                            ->numeric()
                            ->maxLength(3)
                            ->placeholder('e.g. 30'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (isset($data['min_age']) && isset($data['max_age'])) {
                            $query->whereBetween('age', [(int) $data['min_age'], (int) $data['max_age']]);
                        }
                    })
                    ->label('Age Range (Min-Max)'),
                // Additional Citizenship Filters (if needed)
                Filter::make('Citizenship')
                    ->query(function (Builder $query) {
                        $query->where('citizenship', 'Filipino'); // Show only Filipino
                    })
                    ->label('Filipino Citizenship'),
                Filter::make('Other Citizenship')
                    ->query(function (Builder $query) {
                        $query->where('citizenship', 'Others'); // Show only 'Others' for citizenship
                    })
                    ->label('Other Citizenship'),
                Filter::make('Civil Status')
                    ->query(function (Builder $query, array $data) {
                        if (isset($data['civilstatus'])) {
                            $query->where('civilstatus', $data['civilstatus']);
                        }
                    })
                    ->form([
                        Forms\Components\Select::make('civilstatus')
                            ->label('Civil Status')
                            ->options([
                                'Single' => 'Single',
                                'Married' => 'Married',
                                'Widowed' => 'Widowed',
                                'Separated' => 'Separated',
                                'Annulled' => 'Annulled',
                                'Live-in' => 'Live-in',
                            ])
                            ->placeholder('Select Civil Status'),
                    ])
                    
                    ->label('Filter by Civil Status'),
                Filter::make('Position in Family')
                    ->query(function (Builder $query, array $data) {
                        if (isset($data['positioninFamily'])) {
                            $query->where('positioninFamily', $data['positioninFamily']);
                        }
                    })
        
                    ->form([
                        Forms\Components\Select::make('positioninFamily')
                            ->label('Position in Family')
                            ->options([
                                'Head of the family' => 'Head of the family',
                                'Wife' => 'Wife',
                                'Husband' => 'Husband',
                                'Son' => 'Son',
                                'Daughter' => 'Daughter',
                                'Father' => 'Father',
                                'Mother' => 'Mother',
                                'Grandfather' => 'Grandfather',
                                'Grandmother' => 'Grandmother',

                            ])
                            ->placeholder('Select Position in Family'),
                    ])
                    ->label('Filter by Position in Family'),
                Filter::make('Sex')
                    ->query(function (Builder $query, array $data) {
                        if (isset($data['sex'])) {
                            $query->where('sex', $data['sex']);
                        }
                    })
                    ->form([
                        Forms\Components\Select::make('sex')
                            ->label('Sex')
                            ->options([
                                'Male' => 'Male',
                                'Female' => 'Female',
                            ])
                            ->placeholder('Select Sex'),
                    ])
                    ->label('Filter by Sex'),

                    Filter::make('IP Members')
                    ->query(fn (Builder $query) => $query->where('IPmember', 'Yes'))
                    ->label('Filter by IP Members'),
                
                Filter::make('Livestock')
                    ->form([
                        Forms\Components\Select::make('livestock')
                            ->label('Livestock')
                            ->options([
                                'Chickens' => 'Chickens',
                                'Ducks' => 'Ducks',
                                'Pigs' => 'Pigs',
                                'Cattle' => 'Cattle',
                                'Goats' => 'Goats',
                                'Carabaos' => 'Carabaos',
                                'Tilapia' => 'Tilapia',
                                'Bangus (Milkfish)' => 'Bangus (Milkfish)',
                                'Others' => 'Others',
                            ])
                            ->placeholder('Select Livestock'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (isset($data['livestock'])) {
                            $query->where('livestock', $data['livestock']);
                        }
                    })
                    ->label('Filter by Livestock'),
                
                Filter::make('Registered Voters')
                    ->query(fn (Builder $query) => $query->where('registeredVoters', 'Yes'))
                    ->label('Filter by Registered Voters'),
                

            ])
            ->actions([
                Action::make('approve')
                    ->label('Approve')
                    ->action(function (BrgyInhabitant $record) {
                        $record->is_approved = true;
                        $record->save();
                    })
                    ->visible(fn (BrgyInhabitant $record) => Filament::auth()->user() &&
                        (Filament::auth()->user()->hasRole('super_admin') || Filament::auth()->user()->hasRole('brgySecretary')) &&
                        ! $record->is_approved),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if (auth()->user()->hasRole('super_admin') || auth()->user()->hasRole('brgySecretary')) {
            // Show all records, approved or not, for super_admin and brgySecretary
            return $query;
        }

        // Show only approved records for other users
        $query = $query->where('is_approved', true);

        // Check if citizenship is 'Others' and filter by 'other_citizenship'
        $citizenshipFilter = request()->input('citizenship'); // Get citizenship filter from request
        if ($citizenshipFilter === 'Others') {
            $query = $query->whereNotNull('other_citizenship'); // Show records with a non-null 'other_citizenship'
        }

        return $query;
    }

    public static function getRelations(): array
    {
        return [
            // Define any relationships if necessary
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBrgyInhabitants::route('/'),
            'create' => Pages\CreateBrgyInhabitant::route('/create'),
            'edit' => Pages\EditBrgyInhabitant::route('/{record}/edit'),
        ];
    }
}
