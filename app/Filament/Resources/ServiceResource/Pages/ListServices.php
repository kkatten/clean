<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use App\Filament\Resources\ServiceResource\Widgets\ServicesTotalViewsWidget;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServices extends ListRecords
{
    protected static string $resource = ServiceResource::class;

    protected function getHeaderWidgets(): array
    {
        return [ServicesTotalViewsWidget::class];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Добавить услугу'),
        ];
    }
}
