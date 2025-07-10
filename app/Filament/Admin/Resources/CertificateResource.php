<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CertificateResource\Pages;
use App\Mail\CertificateApprovedMail;
use App\Mail\CertificateCancelledMail;
use App\Models\Certificate;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;  // Make sure to import the User model
use Illuminate\Support\Facades\Mail;

class CertificateResource extends Resource
{
    protected static ?string $model = Certificate::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';

    protected static ?string $navigationGroup = 'Certificate & Clearance';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')
                    ->default(fn () => auth()->id()) // Automatically set the current logged-in user's ID
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->label('Name')
                    ->relationship('user', 'name')
                    ->required()
                    ->disabled(),
                Forms\Components\Select::make('user_id')
                    ->label('Email')
                    ->relationship('user', 'email')
                    ->required()
                    ->disabled(),

                Forms\Components\Select::make('certificate_type')
                    ->label('Certificate Type')
                    ->options([
                        'Indigency_certificate' => 'Indigency Certificate',
                        'barangay_clearance' => 'Barangay Clearance',
                        'business_permit' => 'Business Permit',
                        'community_tax_certificate' => 'Community Tax Certificate (CTC)',
                        'health_certificate' => 'Health Certificate',
                        'permit_to_operate' => 'Permit to Operate',
                        'peace_order_clearance' => 'Peace & Order Clearance',
                    ])
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $prices = [
                            'Indigency_certificate' => '100.00',
                            'barangay_clearance' => '150.00',
                            'business_permit' => '300.00',
                            'community_tax_certificate' => '50.00',  // New addition
                            'health_certificate' => '0.00',          // Free service
                            'permit_to_operate' => '200.00',
                            'peace_order_clearance' => '150.00',

                        ];

                        $set('price', $prices[$state] ?? '0.00');
                    }),

                Forms\Components\TextInput::make('price')
                    ->label('Price')
                    ->prefix('₱')
                    ->readOnly()
                    ->maxLength(255),

                Forms\Components\Textarea::make('purpose')
                    ->label('Purpose')
                    ->required(),

                // Using TextInput to display the payment method message
                Forms\Components\TextInput::make('payment_method')
                    ->label('Payment Method')
                    ->default('Please proceed to the Barangay Office for payment.')
                    ->readonly()
                    ->disabled(),

                Forms\Components\Select::make('payment_status')
                    ->label('Payment Status')
                    ->options([
                        'pending' => 'Pending',
                        'failed' => 'Failed',
                    ])
                    ->default('pending')
                    ->required()
                    ->disabled(fn () => Auth::user()->hasRole('brgyUser')),

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'denied' => 'Denied',
                        'cancelled' => 'Cancelled',

                    ])
                    ->default('pending')
                    ->required()
                    ->disabled(fn () => Auth::user()->hasRole('brgyUser')),

                Forms\Components\Toggle::make('is_approved')
                    ->label('Approved')
                    ->disabled()
                    ->visible(fn () => Auth::user()->hasRole('brgySecretary')),

                // Hidden field to automatically set the user_id
                Forms\Components\Hidden::make('user_id')
                    ->default(Auth::id()),

                // Add the DateTimePicker for date, hour, and minute selection without seconds
                Forms\Components\DateTimePicker::make('certificate_date')
                    ->label('Certificate Date')
                    ->required()
                    ->format('Y-m-d H:i') // Format for date with hour and minute, no seconds
                    ->minDate(now()) // Prevent past dates
                    ->hint('Select the date and time for your certificate appointment. Note: If you do not appear at the Barangay Office within 3 working days from the selected date, the appointment will be automatically cancelled.'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')  // Access the 'name' from the related 'User' model
                    ->label('Name')
                    ->searchable(),

                TextColumn::make('user.email')
                    ->label('Email'),

                TextColumn::make('certificate_type')
                    ->label('Certificate Type')
                    ->formatStateUsing(fn ($state) => ucfirst(str_replace('_', ' ', $state))),

                TextColumn::make('price')
                    ->label('Price')
                    ->prefix('₱')
                    ->sortable(),

                TextColumn::make('payment_status')
                    ->label('Payment Status')
                    ->formatStateUsing(fn ($state) => ucfirst($state))
                    ->sortable(),

                TextColumn::make('purpose')
                    ->label('Purpose')
                    ->limit(50),

                TextColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn ($state) => ucfirst(str_replace('_', ' ', $state)))
                    ->sortable()
                    ->searchable(),

                // Add the certificate date column for table view
                TextColumn::make('certificate_date')
                    ->label('Certificate Date')
                    ->dateTime()
                    ->sortable(),

                BooleanColumn::make('is_approved')
                    ->label('Approved')
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle'),
            ])
            ->filters([
                Filter::make('certificate_type')
                    ->label('Certificate Type')
                    ->query(fn (Builder $query) => $query->where('certificate_type', '!=', null)),

                Filter::make('status')
                    ->label('Status')
                    ->form([
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'approved' => 'Approved',
                                'denied' => 'Denied',
                                'cancelled' => 'Cancelled',
                            ])
                            ->placeholder('All'),
                    ])
                    ->query(fn (Builder $query, array $data) => $data['status'] ? $query->where('status', $data['status']) : $query),
            ])
            ->actions([
                Action::make('approve')
                    ->label('Approve')
                    ->action(function (Certificate $record) {
                        $record->is_approved = true;
                        $record->status = 'approved'; // Update the status to "approved"
                        $record->save();

                        // Send email notification to the user
                        Mail::to($record->user->email)->send(new CertificateApprovedMail($record));
                    })
                    ->visible(fn (Certificate $record) => Auth::user()->hasAnyRole(['brgySecretary', 'super_admin']) && ! $record->is_approved),
                Action::make('cancel')
                    ->label('Cancel')
                    ->action(function (Certificate $record) {
                        $record->is_approved = false;
                        $record->status = 'cancelled'; // Update the status to "cancelled"
                        $record->save();

                        // Send email notification to the user
                        Mail::to($record->user->email)->send(new CertificateCancelledMail($record));
                    })
                    ->requiresConfirmation()
                    ->visible(fn (Certificate $record) => Auth::user()->hasAnyRole(['brgySecretary', 'super_admin']) && $record->status !== 'cancelled'),

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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCertificates::route('/'),
            'create' => Pages\CreateCertificate::route('/create'),
            'edit' => Pages\EditCertificate::route('/{record}/edit'),
        ];
    }

    public static function mutateFormDataBeforeCreate(array $data): array
    {
        $prices = [
            'Indigency_certificate' => '100.00',
            'barangay_clearance' => '150.00',
            'business_permit' => '300.00',
            'community_tax_certificate' => '50.00',  // New addition
            'health_certificate' => '0.00',          // Free service
            'permit_to_operate' => '200.00',
            'peace_order_clearance' => '150.00',
        ];

        $data['price'] = $prices[$data['certificate_type']] ?? '0.00';

        return $data;
    }

    public static function mutateFormDataBeforeSave(array $data): array
    {
        $prices = [
            'Indigency_certificate' => '100.00',
            'barangay_clearance' => '150.00',
            'business_permit' => '300.00',
            'community_tax_certificate' => '50.00',  // New addition
            'health_certificate' => '0.00',          // Free service
            'permit_to_operate' => '200.00',
            'peace_order_clearance' => '150.00',
        ];

        $data['price'] = $prices[$data['certificate_type']] ?? '0.00';

        return $data;
    }

    public static function getEloquentQuery(): Builder
    {
        if (Auth::user()->hasRole('brgyUser')) {
            return parent::getEloquentQuery()->where('user_id', Auth::id());
        }

        return parent::getEloquentQuery();
    }
}
