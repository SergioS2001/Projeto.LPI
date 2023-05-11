<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\LineChartWidget;

class DailyUsersChart extends LineChartWidget
{
    protected static ?int $sort = 2;
    protected static ?string $maxHeight = '300px';

    protected function getHeading(): string
    {
        return 'Daily Users';
    }
 
    protected function getData(): array
{
    $userCounts = User::query()
        ->selectRaw('COUNT(*) as count, DATE(created_at) as date')
        ->groupBy('date')
        ->orderBy('date')
        ->pluck('count')
        ->toArray();

    $labels = User::query()
        ->selectRaw('DATE(created_at) as date')
        ->groupBy('date')
        ->orderBy('date')
        ->pluck('date')
        ->toArray();

    return [
        'datasets' => [
            [
                'label' => 'Users',
                'data' => $userCounts,
            ],
        ],
        'labels' => $labels,
    ];
}


    protected function getFilters(): ?array
{
    return [
        'today' => 'Today',
        'week' => 'Last week',
        'month' => 'Last month',
        'year' => 'This year',
    ];
}
}