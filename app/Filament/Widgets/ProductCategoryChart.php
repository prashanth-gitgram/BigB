<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class ProductCategoryChart extends ChartWidget
{
    protected static ?string $heading = 'Products in Category';
    protected static ?string $pollingInterval = '2s';
    protected static ?int $sort = 1;
    protected static ?string $maxHeight = '200px';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Products by Category',
                    'data' => \App\Models\Category::withCount('products')->pluck('products_count')->toArray(),
                    'backgroundColor' => [
                        'rgb(46, 204, 113)', 
                        'rgb(0, 128, 255)',
                        'rgb(255, 206, 86)',
                    ],
                ],
            ],
            'labels' => \App\Models\Category::pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
