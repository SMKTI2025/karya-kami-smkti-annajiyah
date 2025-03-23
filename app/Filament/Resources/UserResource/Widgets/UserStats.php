<?php

namespace App\Filament\Resources\UserResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\User;
use Carbon\Carbon;

class UserStats extends ChartWidget
{
    protected static ?string $heading = '📊 User Growth Statistics';
    protected static ?string $type = 'line';

    protected function getData(): array
    {
        $usersPerMonth = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $data = [];
        $labels = [];

        foreach (range(1, 12) as $month) {
            $labels[] = Carbon::create()->month($month)->format('F'); // Nama bulan
            $data[] = $usersPerMonth->firstWhere('month', $month)->count ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => '📈 New Users per Month',
                    'data' => $data,
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)', // Warna dengan transparansi
                    'borderColor' => 'rgba(75, 192, 192, 1)', // Warna utama garis
                    'borderWidth' => 3,
                    'pointBackgroundColor' => 'rgba(255, 99, 132, 1)', // Warna titik data
                    'pointBorderColor' => '#fff',
                    'pointBorderWidth' => 2,
                    'pointRadius' => 5,
                    'fill' => true, // Mengisi area di bawah garis
                    'tension' => 0.4, // Efek smoothing garis
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return static::$type;
    }
}
