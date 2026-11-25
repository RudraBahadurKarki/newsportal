<?php

namespace App\Filament\Admin\Resources\Advertises\Pages;

use App\Filament\Admin\Resources\Advertises\AdvertiseResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAdvertise extends ViewRecord
{
    protected static string $resource = AdvertiseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
