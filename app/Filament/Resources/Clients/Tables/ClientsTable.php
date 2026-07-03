<?php

namespace App\Filament\Resources\Clients\Tables;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;

class ClientsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('client_id')
                    ->label('Client Ref')
                    ->searchable(),
                TextColumn::make('full_name')
                    ->label('Client Name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                TextColumn::make('state')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge()
                    ->searchable(),
                IconColumn::make('portal_login')
                    ->label('Portal Login')
                    ->boolean()
                    ->state(fn ($record): bool => $record->portalUsers()->where('role', 'client')->exists()),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                Action::make('createLogin')
                    ->label(fn ($record): string => $record->portalUsers()->where('role', 'client')->exists() ? 'Reset Login' : 'Create Login')
                    ->icon('heroicon-o-key')
                    ->color('info')
                    ->form([
                        TextInput::make('password')
                            ->password()
                            ->revealable()
                            ->minLength(8)
                            ->required(),
                        TextInput::make('password_confirmation')
                            ->password()
                            ->revealable()
                            ->same('password')
                            ->required(),
                    ])
                    ->action(function ($record, array $data): void {
                        if (blank($record->email)) {
                            Notification::make()
                                ->title('Client email is required before creating login access.')
                                ->danger()
                                ->send();

                            return;
                        }

                        User::query()->updateOrCreate(
                            ['email' => $record->email],
                            [
                                'name' => $record->full_name,
                                'email' => $record->email,
                                'role' => 'client',
                                'client_id' => $record->id,
                                'password' => Hash::make($data['password']),
                            ],
                        );

                        Notification::make()
                            ->title('Client portal login saved successfully.')
                            ->success()
                            ->send();
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
