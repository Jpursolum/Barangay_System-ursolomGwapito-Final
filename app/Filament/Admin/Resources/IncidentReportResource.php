<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\IncidentReportResource\Pages;
use App\Models\IncidentReport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class IncidentReportResource extends Resource
{
    protected static ?string $model = IncidentReport::class;

    protected static ?string $navigationIcon = 'heroicon-o-flag';

    protected static ?string $navigationGroup = 'Incident Reports Management';

    protected static ?string $pluralModelLabel = 'Incident Reports';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\DateTimePicker::make('incident_datetime')
                            ->label('Date & Time of Incident')
                            ->required(),
                        Forms\Components\TextInput::make('location')
                            ->label('Location')
                            ->required(),
                        Forms\Components\Select::make('incident_type')
                            ->label('Type of Incident')
                            ->options([
                                'altercation' => 'Altercation',
                                'theft' => 'Theft',
                                'accident' => 'Accident',
                                'vandalism' => 'Vandalism',
                                'disturbance' => 'Disturbance',
                                'trespassing' => 'Trespassing',
                                'others' => 'Others',
                            ])
                            ->required()
                            ->reactive(),
                        Forms\Components\TextInput::make('other_incident_type')
                            ->label('Specify Other Incident')
                            ->visible(fn ($get) => $get('incident_type') === 'others')
                            ->required(fn ($get) => $get('incident_type') === 'others'),
                    ])->columns(2)->collapsible(),

                Forms\Components\Section::make('Persons Involved')
                    ->schema([
                        Forms\Components\Repeater::make('persons_involved')
                            ->label('Individuals Involved')
                            ->schema([
                                Forms\Components\TextInput::make('name')->label('Full Name')->required(),
                                Forms\Components\TextInput::make('age')->label('Age')->numeric()->required(),
                            ])->columns(2),
                        Forms\Components\Toggle::make('is_resident')
                            ->label('Residency Status')
                            ->helperText('Check if residents, uncheck if visitors.'),
                        Forms\Components\Repeater::make('witnesses')
                            ->label('Witnesses')
                            ->schema([
                                Forms\Components\TextInput::make('witness_name')->label('Witness Full Name')->required(),
                                Forms\Components\TextInput::make('witness_contact')->label('Contact Information')->tel(),
                            ])->columns(2),
                    ])->collapsible(),

                Forms\Components\Section::make('Incident Description')
                    ->schema([
                        Forms\Components\Textarea::make('incident_details')
                            ->label('Details of Incident')
                            ->required(),
                        Forms\Components\Textarea::make('injuries_or_damages')
                            ->label('Injuries or Damages'),
                    ])->collapsible(),

                Forms\Components\Section::make('Immediate Response')
                    ->schema([
                        Forms\Components\Textarea::make('actions_taken')
                            ->label('Actions Taken'),
                        Forms\Components\Select::make('resolution_or_escalation')
                            ->label('Resolution or Escalation')
                            ->options([
                                'pending' => 'Pending',
                                'resolved' => 'Resolved Locally',
                                'escalated' => 'Escalated to Authorities',
                            ]),
                    ])->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('incident_datetime')
                    ->label('Incident Date & Time')
                    ->sortable(),
                Tables\Columns\TextColumn::make('location')
                    ->label('Location')
                    ->sortable(),
                Tables\Columns\TextColumn::make('incident_type')
                    ->label('Incident Type')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Reported On')
                    ->dateTime(),
            ])
            ->filters([
                Tables\Filters\Filter::make('month')
                    ->label('Filter by Month')
                    ->form([
                        Forms\Components\Select::make('month')
                            ->options([
                                '01' => 'January',
                                '02' => 'February',
                                '03' => 'March',
                                '04' => 'April',
                                '05' => 'May',
                                '06' => 'June',
                                '07' => 'July',
                                '08' => 'August',
                                '09' => 'September',
                                '10' => 'October',
                                '11' => 'November',
                                '12' => 'December',
                            ])
                            ->placeholder('Select Month'),
                    ])
                    ->query(function ($query, array $data) {
                        if (! empty($data['month'])) {
                            $query->whereMonth('incident_datetime', $data['month']);
                        }
                    }),

                Tables\Filters\Filter::make('year')
                    ->label('Filter by Year')
                    ->form([
                        Forms\Components\TextInput::make('year')
                            ->numeric()
                            ->placeholder('Enter Year'),
                    ])
                    ->query(function ($query, array $data) {
                        if (! empty($data['year'])) {
                            $query->whereYear('incident_datetime', $data['year']);
                        }
                    }),

                Tables\Filters\SelectFilter::make('incident_type')
                    ->label('Filter by Incident Type')
                    ->options([
                        'altercation' => 'Altercation',
                        'theft' => 'Theft',
                        'accident' => 'Accident',
                        'vandalism' => 'Vandalism',
                        'disturbance' => 'Disturbance',
                        'trespassing' => 'Trespassing',
                        'others' => 'Others',
                    ]),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIncidentReports::route('/'),
            'create' => Pages\CreateIncidentReport::route('/create'),
            'edit' => Pages\EditIncidentReport::route('/{record}/edit'),
        ];
    }
}
