<?php

namespace App\Filament\Admin\Widgets;

use App\Models\BrgyInhabitant;
use Filament\Widgets\Widget;

class GenderChartWidget extends Widget
{
    protected static string $view = 'filament.admin.widgets.gender-chart-widget';

    protected function getType(): string
    {
        return 'pie';
    }

    protected function getData(): array
    {
        $maleCount = BrgyInhabitant::where('sex', 'Male')->count();
        $femaleCount = BrgyInhabitant::where('sex', 'Female')->count();

        return [
            'datasets' => [
                [
                    'data' => [$maleCount, $femaleCount],
                    'backgroundColor' => ['#3490dc', '#e3342f'], // Blue for Male, Red for Female
                ],
            ],
            'labels' => ['Male', 'Female'],
        ];
    }
}
