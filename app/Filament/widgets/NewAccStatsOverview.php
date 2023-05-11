<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Carbon\Carbon;
use App\Models\User;

class NewAccStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        // Get the number of new customers from your database or any other source
        $newCustomersCount = User::where('created_at', '>=', Carbon::now()->subDays(30))->count();

        // Get the previous count of accounts
        $previousCount = 1; // Retrieve the previous count from your database or any other source

        // Calculate the difference and percentage change
        $difference = $newCustomersCount - $previousCount;
        $percentageChange = ($difference / $previousCount) * 100;
        $percentageChange = round($percentageChange, 2);

        // Prepare the description text
        $description = ($percentageChange >= 0) ? "% increase" : "% decrease";
        $descriptionIcon = ($percentageChange >= 0) ? "heroicon-s-trending-up" : "heroicon-s-trending-down";

        return [
            Card::make('New accounts', $newCustomersCount)
                ->description($description)
                ->descriptionIcon($descriptionIcon)
                ->chart([7, 2, 10, 3, 15, 4, 17]) // Replace with your actual chart data
                ->color('success'),
                Card::make('Average time on page', '3:12')
                ->description('3% increase')
                ->descriptionIcon('heroicon-s-trending-up'),
        ];
    }
}