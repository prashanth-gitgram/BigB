<?php

namespace App\Filament\Resources\ProductCaseStudyResource\Pages;

use App\Filament\Resources\ProductCaseStudyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductCaseStudies extends ListRecords
{
    protected static string $resource = ProductCaseStudyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
