<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalTransaction = Transaction::sum('total');
        $totalOrder = Transaction::count();
        $pendingCount = Transaction::where('status', 'pending')->count();


        return [
            Stat::make('Total Pendapatan', number_format($totalTransaction, 0, ',', '.'))
                ->description('')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Jumlah Pesanan', $totalOrder)
                ->description('')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('warning'),
            Stat::make('Pesanan Perlu Diproses', $pendingCount)
                ->description('')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('danger'),
        ];
    }
}
