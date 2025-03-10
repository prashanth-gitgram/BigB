<?php

namespace App\Filament\Resources\ProductAnalysisResource\Pages;

use App\Filament\Resources\ProductAnalysisResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductAnalyses extends ListRecords
{
    protected static string $resource = ProductAnalysisResource::class;


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
