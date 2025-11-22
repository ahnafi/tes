<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama')
                    ->required(),
                TextInput::make('email')
                    ->label('Alamat Email')
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at')
                    ->label('Email Diverifikasi Pada'),
                TextInput::make('password')
                    ->label('Kata Sandi')
                    ->password()
                    ->required(),
                Select::make('roles')
                    ->multiple()
                    ->preload()
                    ->relationship('roles', 'name')
                    ->label('Peran')
                    ->required(),
            ]);
    }
}
