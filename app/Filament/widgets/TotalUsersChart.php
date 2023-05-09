<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\LineChartWidget;

class TotalUsersChart extends LineChartWidget
{
    protected static ?string $heading = 'Total users';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $userCounts = User::query()
            ->selectRaw('COUNT(*) as count, DATE_FORMAT(created_at, "%b %Y") as month_year')
            ->groupBy('month_year')
            ->orderBy('month_year')
            ->pluck('count')
            ->toArray();

        $labels = User::query()
            ->selectRaw('DATE_FORMAT(created_at, "%b %Y") as month_year')
            ->groupBy('month_year')
            ->orderBy('month_year')
            ->pluck('month_year')
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
}