<?php

namespace App\Filament\Resources\ProductAnalysisResource\Pages;

use App\Filament\Resources\ProductAnalysisResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProductAnalysis extends CreateRecord
{
    protected static string $resource = ProductAnalysisResource::class;

    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
