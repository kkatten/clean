<?php

namespace App\Filament\Resources\ServiceResource\Widgets;

use App\Models\Service;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ServicesTotalViewsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $total = (int) Service::sum('views');

        return [
            Stat::make('Всего просмотров', number_format($total, 0, ',', ' '))
                ->icon('heroicon-o-eye'),
        ];
    }
}
