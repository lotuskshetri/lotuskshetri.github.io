<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestOrders extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 2;
    public function table(Table $table): Table
    {
        return $table
            ->query(OrderResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('grand_total')
                    ->searchable()
                    ->sortable()
                    ->label('Total Amount')
                    ->money('NPR'),

                TextColumn::make('id')
                    ->label('Order ID')
                    ->searchable(),

                TextColumn::make('user.name')
                    ->label('Customer Name')
                    ->searchable(),

                TextColumn::make('status')
                    ->searchable()
                    ->sortable()
                    ->label('Order Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'new' => 'info',
                        'processing' => 'warning',
                        'shipped' => 'success',
                        'delivered' => 'success',
                        'canceled' => 'danger',
                    })
                    ->icon(fn(string $state): string => match ($state) {
                        'new' => 'heroicon-m-sparkles',
                        'processing' => 'heroicon-m-arrow-path',
                        'shipped' => 'heroicon-m-truck',
                        'delivered' => 'heroicon-m-check-badge',
                        'canceled' => 'heroicon-m-x-circle',
                    }),

                TextColumn::make('payment_method')
                    ->searchable()
                    ->searchable()
                    ->label('Payment Method'),

                TextColumn::make('payment_status')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->label('Payment Status'),

                TextColumn::make('created_at')
                    ->searchable()
                    ->sortable()
                    ->label('Order Date')
                    ->dateTime(),
            ])
            ->actions([
                Action::make('view')
                    ->label('View Order')
                    ->icon('heroicon-m-eye')
                    ->url(fn(Order $record):string => OrderResource::getUrl('view', ['record' => $record])),
            ]);
    }
}
