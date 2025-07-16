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
use Filament\Tables\Filters\Components\TextInput; // make sure naka-import ito

class BrgyInhabitantResource extends Resource
{
    protected static ?string $model = BrgyInhabitant::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Inhabitant Management';

 public static function form(Forms\Form $form): Forms\Form
{
    return $form->schema([
        Forms\Components\Hidden::make('user_id')->default(auth()->id()),

        Tabs::make('Barangay Inhabitant Form')
          ->columnSpan('full') // take full width para maka-center
    ->maxWidth('15xl')    // optional sizes: 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '7xl'
            ->tabs([

                // 1. Personal Info
                Tabs\Tab::make('Personal Info')->schema([
                    Forms\Components\TextInput::make('lastname')->required()->maxLength(255),
                    Forms\Components\TextInput::make('firstname')->required()->maxLength(255),
                    Forms\Components\TextInput::make('middlename')->label('Middlename (optional)')->maxLength(255),
                    Forms\Components\TextInput::make('extensionName')->label('Extension Name (optional)')->maxLength(255),
                    Forms\Components\DatePicker::make('birthdate')
                        ->required()
                        ->displayFormat('Y-m-d')
                        ->format('Y-m-d')
                        ->maxDate(now())
                        ->reactive()
                        ->lazy()
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
                        ->dehydrated(true)
                        ->reactive(),
                    Forms\Components\Select::make('sex')->required()->options(['Male' => 'Male', 'Female' => 'Female']),
                ]),

                // 2. Demographics
                Tabs\Tab::make('Demographics')->schema([
                    Forms\Components\Select::make('purok')
                        ->label('Purok')
                        ->options([
                            'Purok 1' => 'Purok 1',
                            'Purok 2' => 'Purok 2',
                            'Purok 3' => 'Purok 3',
                            'Purok 4' => 'Purok 4',
                            'Purok 5' => 'Purok 5',
                            'Purok 6' => 'Purok 6',
                            'Others' => 'Others',
                        ])
                        ->required()
                        ->reactive(),
                    Forms\Components\TextInput::make('other_purok')
                        ->label('Please specify Purok')
                        ->required()
                        ->visible(fn ($get) => $get('purok') === 'Others'),
                    Forms\Components\TextInput::make('placeofbirth')->required()->maxLength(255),
                    Forms\Components\Select::make('civilstatus')
                        ->required()
                        ->options([
                            'Single' => 'Single', 'Married' => 'Married', 'Widowed' => 'Widowed',
                            'Separated' => 'Separated', 'Annulled' => 'Annulled', 'Live-in' => 'Live-in'
                        ]),
                    Forms\Components\Select::make('citizenship')->required()
                        ->options(['Filipino' => 'Filipino', 'Others' => 'Others'])
                        ->default('Filipino')
                        ->reactive(),
                    Forms\Components\TextInput::make('other_citizenship')
                        ->label('Please specify citizenship')
                        ->required()
                        ->visible(fn ($get) => $get('citizenship') === 'Others'),
                ]),

                // 3. Education & Work
                Tabs\Tab::make('Education & Work')->schema([
                    Forms\Components\Select::make('educAttainment')
                        ->label('Educational Attainment')
                        ->options([
                            'No Formal Education' => 'No Formal Education',
                            'Elementary' => 'Elementary',
                            'High School' => 'High School',
                            'Vocational' => 'Vocational',
                            'Undergraduate' => 'Undergraduate',
                            'Graduate' => 'Graduate',
                            'Postgraduate' => 'Postgraduate',
                            'Others' => 'Others',
                        ])
                        ->required()
                        ->reactive(),
                    Forms\Components\TextInput::make('other_educationalAtt')
                        ->label('Please specify Attainment')
                        ->required(fn ($get) => $get('educAttainment') === 'Others')
                        ->visible(fn ($get) => $get('educAttainment') === 'Others'),
                    Forms\Components\Select::make('occupation')
                        ->label('Occupation')
                        ->required()
                        ->options([
                            'Teacher' => 'Teacher',
                            'Farmer' => 'Farmer',
                            'Laborer' => 'Laborer',
                            'Fisherman' => 'Fisherman',
                            'Vendor' => 'Vendor',
                            'Others' => 'Others'
                        ])
                        ->reactive(),
                    Forms\Components\TextInput::make('other_occupation')
                        ->label('Please specify Occupation')
                        ->required(fn ($get) => $get('occupation') === 'Others')
                        ->visible(fn ($get) => $get('occupation') === 'Others'),
                    Forms\Components\Select::make('ofw')->required()->options(['Yes' => 'Yes', 'No' => 'No']),
                    Forms\Components\Select::make('pwd')->required()->options(['Yes' => 'Yes', 'No' => 'No']),
                    Forms\Components\Select::make('registeredVoters')->required()->options(['Yes' => 'Yes', 'No' => 'No']),
                    Forms\Components\Select::make('IPmember')->label('IP member')->required()->options(['Yes' => 'Yes', 'No' => 'No']),
                ]),

                // 4. Contact Info
                Tabs\Tab::make('Contact Info')->schema([
                    Forms\Components\TextInput::make('email')->label('Active Email Account')->email()->required(),
                ]),

                // 5. Family Info
                Tabs\Tab::make('Family Info')->schema([
                    Forms\Components\Select::make('positioninFamily')
                        ->label('Position in Family')
                        ->required()
                        ->options([
                            'Head of the family' => 'Head of the family', 'Wife' => 'Wife', 'Husband' => 'Husband',
                            'Son' => 'Son', 'Daughter' => 'Daughter', 'Father' => 'Father', 'Mother' => 'Mother',
                            'Grandfather' => 'Grandfather', 'Grandmother' => 'Grandmother',
                        ])
                        ->reactive(),
                    Forms\Components\TextInput::make('family_code')
                        ->label('Enter Family Code')
                        ->required(fn ($get) => $get('positioninFamily') !== 'Head of the family')
                        ->visible(fn ($get) => $get('positioninFamily') !== 'Head of the family'),
                    Forms\Components\TextInput::make('family_code')
                        ->label('Family Code')
                        ->default(fn () => 'FMLY-' . now()->format('Ymd') . '-' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT))
                        ->readOnly()
                        ->dehydrated()
                        ->required()
                        ->visible(fn ($get) => $get('positioninFamily') === 'Head of the family'),
                ]),

                // 6. Family Profile (Head of Family only)
                Tabs\Tab::make('Family Profile')
                    ->visible(fn ($get) => $get('positioninFamily') === 'Head of the family')
                    ->schema([
                        Forms\Components\TextInput::make('religion')->label('Religion'),
                        Forms\Components\Select::make('livestock')
                            ->label('Livestock')
                            ->required()
                            ->options([
                                'Chickens', 'Ducks', 'Pigs', 'Cattle', 'Goats', 'Carabaos', 'Tilapia', 'Bangus (Milkfish)', 'Others'
                            ])
                            ->reactive(),
                        Forms\Components\TextInput::make('other_livestock')
                            ->label('Please specify Livestock')
                            ->required(fn ($get) => $get('livestock') === 'Others')
                            ->visible(fn ($get) => $get('livestock') === 'Others'),

                        Forms\Components\Select::make('monthlyincome')
                            ->label('Monthly Income')
                            ->required()
                            ->options([
                                'Below 10,000', '10,000 - 20,000', '20,000 - 30,000', '30,000 - 40,000',
                                '40,000 - 50,000', 'Above 50,000', 'Others'
                            ])
                            ->reactive(),
                        Forms\Components\TextInput::make('other_monthlyincome')
                            ->label('Please specify Monthly Income')
                            ->required(fn ($get) => $get('monthlyincome') === 'Others')
                            ->visible(fn ($get) => $get('monthlyincome') === 'Others'),

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
                        Forms\Components\Select::make('watersource')
                            ->label('Water Source')
                            ->required()
                            ->options([
                                'Tap Water', 'Well', 'Spring', 'Rainwater', 'Others',
                            ])
                            ->reactive(),
                        Forms\Components\TextInput::make('other_watersource')
                            ->label('Please specify Water Source')
                            ->required(fn ($get) => $get('watersource') === 'Others')
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
                    ]),
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
                        Filter::make('Family Code')
                            ->form([
                                Forms\Components\TextInput::make('family_code')
                                    ->label('Family Code'),
                            ])
                            ->query(function (Builder $query, array $data) {
                                if (!empty($data['family_code'])) {
                                    $query->where('family_code', $data['family_code']);
                                }
                            })
                            ->label('Filter by Family Code'),
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
                    Tables\Actions\ViewAction::make(),
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

    // If NOT admin or secretary → show only their own record
    if (!auth()->user()->hasRole('super_admin') && !auth()->user()->hasRole('brgySecretary')) {
        $query->where('user_id', auth()->id());
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
