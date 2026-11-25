<?php

namespace App\Filament\Admin\Resources\Advertises\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AdvertiseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('company_name')
                    ->required(),
                TextInput::make('contact_no')
                    ->required(),
                TextInput::make('banner')
                    ->required(),
                DatePicker::make('expire_date')
                    ->required(),
                TextInput::make('redirect_link')
                    ->required(),
            ]);
    }
}
