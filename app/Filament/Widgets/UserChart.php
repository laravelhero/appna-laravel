<?php

namespace App\Filament\Widgets;

use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class UserChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static ?string $chartId = 'userChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Member Chart';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    // protected function getOptions(): array
    // {
    //     return [
    //         'chart' => [
    //             'type' => 'bar',
    //             'height' => 300,
    //         ],
    //         'series' => [
    //             [
    //                 'name' => 'MemberChart',
    //                 'data' => [7, 4, 6, 10, 14, 7, 5, 9, 10, 15, 13, 18],
    //             ],
    //         ],
    //         'xaxis' => [
    //             'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    //             'labels' => [
    //                 'style' => [
    //                     'fontFamily' => 'inherit',
    //                     'fontWeight' => 600,
    //                 ],
    //             ],
    //         ],
    //         'yaxis' => [
    //             'labels' => [
    //                 'style' => [
    //                     'fontFamily' => 'inherit',
    //                 ],
    //             ],
    //         ],
    //         'colors' => ['#f59e0b'],
    //     ];


    // }
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('first_name'),
                TextEntry::make('last_name'),
                TextEntry::make('phone'),
                TextEntry::make('amount')->money('USD'),
                TextEntry::make('purpose'),
                TextEntry::make('created_at')->date(),
            ]);
    }
}
