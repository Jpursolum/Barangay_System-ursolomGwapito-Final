<?php

namespace App\Filament\Admin\Pages;

use App\Filament\Admin\Widgets\AgeGroupChartWidget;
use App\Filament\Admin\Widgets\GenderChartWidget;
use App\Models\BrgyInhabitant;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Pages\Page;

class DemographicStatistics extends Page
{
    use HasPageShield;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.admin.pages.demographic-statistics';

    // This method calculates the statistics needed for the page
    public function getDemographicData(): array
    {
        // Calculate statistics for approved records
        $totalPopulation = BrgyInhabitant::where('is_approved', true)->count();
        $maleCount = BrgyInhabitant::where('is_approved', true)->where('sex', 'Male')->count();
        $femaleCount = BrgyInhabitant::where('is_approved', true)->where('sex', 'Female')->count();

        $ageGroups = [
            '0-17' => BrgyInhabitant::where('is_approved', true)->whereBetween('age', [0, 17])->count(),
            '18-35' => BrgyInhabitant::where('is_approved', true)->whereBetween('age', [18, 35])->count(),
            '36-60' => BrgyInhabitant::where('is_approved', true)->whereBetween('age', [36, 60])->count(),
            '60+' => BrgyInhabitant::where('is_approved', true)->where('age', '>', 60)->count(),
        ];

        return [
            'total_population' => $totalPopulation,
            'male_count' => $maleCount,
            'female_count' => $femaleCount,
            'age_groups' => $ageGroups,
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            GenderChartWidget::class,
            AgeGroupChartWidget::class,
        ];
    }
}
