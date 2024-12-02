<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use Filament\Tables\Actions\Action;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestOrders extends BaseWidget {

    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(OrderResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('id')
                ->label('ID do pedido')
                ->searchable(),

                TextColumn::make('user.name')
                ->label('Nome')
                ->searchable(),

                TextColumn::make('grand_total')
                ->label('Total')
                ->money('BRL'),

                TextColumn::make('status')
                ->badge()
                ->color(fn (string $state):string => match($state) {
                    'new' => 'info',
                    'processing' => 'warning',
                    'shipped' => 'success',
                    'delivered' => 'success',
                    'cancelled' => 'danger'
                })
                ->icon(fn (string $state):string => match($state) {
                    'new' => 'heroicon-m-sparkles',
                    'processing' => 'heroicon-m-arrow-path',
                    'shipped' => 'heroicon-m-truck',
                    'delivered' => 'heroicon-m-check-badge',
                    'cancelled' => 'heroicon-m-x-circle',
                })
                ->sortable(),

                TextColumn::make('payment_method')
                ->label('Método de pagamento')
                ->sortable()
                ->searchable(),

                TextColumn::make('payment_status')
                ->label('Status do pagamento')
                ->sortable()
                ->badge()
                ->searchable(),

                TextColumn::make('created_at')
                ->label('Data')
                ->dateTime(),
            ])
            ->actions([
                Action::make('Ver')
                ->url(fn (Order $record):string => OrderResource::getUrl('view', ['record' => $record]))
                ->color('info')
                ->icon('heroicon-o-eye'),

                Tables\Actions\DeleteAction::make(),
            ]);
    }
}
