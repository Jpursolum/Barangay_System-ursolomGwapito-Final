<?php

namespace App\Filament\Admin\Widgets;

use App\Models\BrgyInhabitant;
use Filament\Widgets\Widget;

class GenderStatsWidget extends Widget
{
    protected static string $view = 'filament.admin.widgets.gender-stats-widget';

    protected int|string|array $columnSpan = 'full';

    public int $maleCount = 0;

    public int $femaleCount = 0;

    public function mount(): void
    {
        $this->maleCount = BrgyInhabitant::where('sex', 'Male')->count();
        $this->femaleCount = BrgyInhabitant::where('sex', 'Female')->count();
    }
}
