<?php

namespace App\Filament\Admin\Resources\Advertises\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AdvertiseInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('company_name'),
                TextEntry::make('contact_no'),
                TextEntry::make('banner'),
                TextEntry::make('expire_date')
                    ->date(),
                TextEntry::make('redirect_link'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
