<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductCaseStudyResource\Pages;
use App\Filament\Resources\ProductCaseStudyResource\RelationManagers;
use App\Models\ProductCaseStudy;
use Filament\Forms;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductCaseStudyResource extends Resource
{
    protected static ?string $model = ProductCaseStudy::class;

    protected static ?string $navigationIcon = 'heroicon-m-numbered-list';
    protected static ?string $navigationGroup = 'Products';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('product_id')
                    ->relationship('product', 'name', fn(Builder $query) => $query->where('status', 'approved')->whereDoesntHave('CaseStudy')),
                KeyValue::make('study_details'),
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
                    ->color(fn(string $state): string => match ($state) {
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
            'index' => Pages\ListProductCaseStudies::route('/'),
            'create' => Pages\CreateProductCaseStudy::route('/create'),
            'edit' => Pages\EditProductCaseStudy::route('/{record}/edit'),
        ];
    }
}
