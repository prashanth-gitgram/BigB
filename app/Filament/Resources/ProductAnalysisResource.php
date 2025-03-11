<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductAnalysisResource\Pages;
use App\Filament\Resources\ProductAnalysisResource\RelationManagers;
use App\Models\ProductAnalysis;
use Filament\Forms;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductAnalysisResource extends Resource
{
    protected static ?string $model = ProductAnalysis::class;

    protected static ?string $navigationIcon = 'heroicon-o-magnifying-glass-circle';
    protected static ?string $navigationLabel = 'Product Analysis';
    protected static ?string $pluralModelLabel = 'Product Analysis';
    protected static ?string $navigationGroup = 'Products';
    protected static ?int $navigationSort = 3;
   

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('product_id')
                    ->relationship('product', 'name', 
                    fn (Builder $query) => $query->whereHas('caseStudy', fn ($q) => $q->where('status', 'approved'))->whereDoesntHave('Analysis'))
                    ->required(),
                KeyValue::make('analysis_details'),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected'
                    ])->required()
                    ->visibleOn('edit'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('product.name'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                    })
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductAnalyses::route('/'),
            'create' => Pages\CreateProductAnalysis::route('/create'),
            'edit' => Pages\EditProductAnalysis::route('/{record}/edit'),
        ];
    }
}
