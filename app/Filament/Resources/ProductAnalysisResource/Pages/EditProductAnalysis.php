<?php

namespace App\Filament\Resources\ProductAnalysisResource\Pages;

use App\Filament\Resources\ProductAnalysisResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductAnalysis extends EditRecord
{
    protected static string $resource = ProductAnalysisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
