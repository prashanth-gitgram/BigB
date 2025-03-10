<?php

namespace App\Filament\Resources\ProductCaseStudyResource\Pages;

use App\Filament\Resources\ProductCaseStudyResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProductCaseStudy extends CreateRecord
{
    protected static string $resource = ProductCaseStudyResource::class;

    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
