<?php

namespace App\Filament\Widgets;

use App\Models\Estágios;
use App\Models\User;
use Filament\Widgets\LineChartWidget;

class TotalEstágiosChart extends LineChartWidget
{
    protected static ?string $heading = 'Total Estágios';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $userCounts = Estágios::query()
            ->selectRaw('COUNT(*) as count, DATE_FORMAT(created_at, "%b %Y") as month_year')
            ->groupBy('month_year')
            ->orderBy('month_year')
            ->pluck('count')
            ->toArray();


        return [
            'datasets' => [
                [
                    'label' => 'Estágios',
                    'data' => $userCounts,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }
}