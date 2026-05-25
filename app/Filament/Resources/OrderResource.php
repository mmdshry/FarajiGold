<?php

namespace App\Filament\Resources;

use App\Enums\OrderStatus;
use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $modelLabel = 'سفارش';
    protected static ?string $pluralModelLabel = 'سفارشات';

    public static function form(Schema $form): Schema
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->label('فروشنده'),
                Forms\Components\TextInput::make('weight_in_grams')
                    ->required()
                    ->numeric()
                    ->label('وزن (گرم)'),
                Forms\Components\Select::make('status')
                    ->options(OrderStatus::class)
                    ->required()
                    ->label('وضعیت'),
                Forms\Components\Textarea::make('rejection_reason')
                    ->label('دلیل رد سفارش')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('شماره سفارش')
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('فروشنده')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('weight_in_grams')
                    ->numeric()
                    ->label('وزن (گرم)')
                    ->sortable(),
                Tables\Columns\SelectColumn::make('status')
                    ->options(OrderStatus::class)
                    ->label('وضعیت')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('تاریخ ثبت')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(OrderStatus::class)
                    ->label('وضعیت'),
                Tables\Filters\SelectFilter::make('user_id')
                    ->relationship('user', 'name')
                    ->label('فروشنده')
                    ->searchable(),
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\Action::make('approve_initial')
                    ->label('تایید اولیه')
                    ->color('info')
                    ->icon('heroicon-o-check')
                    ->requiresConfirmation()
                    ->action(fn(Order $record) => $record->update(['status' => OrderStatus::INITIAL_APPROVAL]))
                    ->visible(fn(Order $record) => $record->status === OrderStatus::PENDING_APPROVAL),
                \Filament\Actions\Action::make('approve_final')
                    ->label('تایید نهایی')
                    ->color('success')
                    ->icon('heroicon-o-check-badge')
                    ->requiresConfirmation()
                    ->action(fn(Order $record) => $record->update(['status' => OrderStatus::FINAL_APPROVAL]))
                    ->visible(fn(Order $record) => $record->status === OrderStatus::INITIAL_APPROVAL),
                \Filament\Actions\Action::make('reject')
                    ->label('عدم تایید')
                    ->color('danger')
                    ->icon('heroicon-o-x-mark')
                    ->form([
                        Forms\Components\Textarea::make('reason')
                            ->label('دلیل عدم تایید')
                            ->required()
                    ])
                    ->action(function (Order $record, array $data) {
                        $record->update([
                            'status' => OrderStatus::REJECTED,
                            'rejection_reason' => $data['reason'],
                        ]);
                    })
                    ->visible(fn(Order $record) => !in_array($record->status, [OrderStatus::REJECTED, OrderStatus::FINAL_APPROVAL])),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
