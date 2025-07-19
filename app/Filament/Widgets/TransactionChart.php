<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Flowframe\Trend\Trend;
use App\Models\Transaction;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class TransactionChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Pendapatan Bulan Ini';
    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        // set data untuk grafik
        $startDate = Carbon::createFromFormat('Y-m-d', '2025-07-01');
        $endDate = Carbon::createFromFormat('Y-m-d', '2025-07-30');

        // Ambil data transaksi per bulan
        $data = Trend::query(Transaction::where('status', 'pending'))
            ->between(
                start: $startDate,
                end: $endDate
            )
            ->perDay() // Hitung data per bulan
            ->sum('total'); // Hitung total transaksi per bulan berdasarkan 'total'

        // Return data untuk chart
        return [
            'datasets' => [
                [
                    'label' => 'Total Transactions',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'fill' => true,
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date), // Format tanggal untuk label bulan
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
