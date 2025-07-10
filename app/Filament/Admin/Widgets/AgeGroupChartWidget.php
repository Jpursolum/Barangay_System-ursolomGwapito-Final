<?php

namespace App\Filament\Admin\Widgets;

use App\Models\BrgyInhabitant;
use Filament\Widgets\Widget;

class AgeGroupChartWidget extends Widget
{
    protected static string $view = 'filament.admin.widgets.age-group-chart-widget';

    // Set chart type to "pie"
    protected function getType(): string
    {
        return 'pie';
    }

    protected function getData(): array
    {
        $ageGroups = [
            '0-17' => BrgyInhabitant::whereBetween('age', [0, 17])->count(),
            '18-35' => BrgyInhabitant::whereBetween('age', [18, 35])->count(),
            '36-60' => BrgyInhabitant::whereBetween('age', [36, 60])->count(),
            '60+' => BrgyInhabitant::where('age', '>', 60)->count(),
        ];

        return [
            'datasets' => [
                [
                    'data' => array_values($ageGroups),
                    'backgroundColor' => ['#f6ad55', '#fc8181', '#63b3ed', '#68d391'],
                ],
            ],
            'labels' => array_keys($ageGroups),
        ];
    }
}
