<?php

namespace App\Filament\Resources;

use App\Enums\MerchantStatus;
use App\Filament\Resources\MerchantResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class MerchantResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-users';
    protected static ?string $modelLabel = 'فروشنده';
    protected static ?string $pluralModelLabel = 'فروشندگان';

    public static function form(Schema $form): Schema
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('نام'),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->label('ایمیل'),
                Forms\Components\Select::make('role')
                    ->options([
                        'merchant' => 'Merchant',
                        'admin' => 'Admin',
                    ])
                    ->required()
                    ->label('نقش'),
                Forms\Components\Select::make('status')
                    ->options(MerchantStatus::class)
                    ->required()
                    ->label('وضعیت'),
                Forms\Components\FileUpload::make('national_id_path')
                    ->label('کارت ملی')
                    ->image()
                    ->directory('kyc_documents'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('نام')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('ایمیل')
                    ->searchable(),
                Tables\Columns\TextColumn::make('role')
                    ->label('نقش'),
                Tables\Columns\SelectColumn::make('status')
                    ->options(MerchantStatus::class)
                    ->label('وضعیت')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('تاریخ ثبت نام')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\Action::make('verify')
                    ->label('تایید حساب')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(fn(User $record) => $record->update(['status' => MerchantStatus::ACTIVE]))
                    ->visible(fn(User $record) => $record->status !== MerchantStatus::ACTIVE),
                \Filament\Actions\Action::make('ban')
                    ->label('مسدود کردن')
                    ->icon('heroicon-o-no-symbol')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(fn(User $record) => $record->update(['status' => MerchantStatus::BANNED]))
                    ->visible(fn(User $record) => $record->status !== MerchantStatus::BANNED),
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
            'index' => Pages\ListMerchants::route('/'),
            'create' => Pages\CreateMerchant::route('/create'),
            'edit' => Pages\EditMerchant::route('/{record}/edit'),
        ];
    }
}
