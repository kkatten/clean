<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditService extends EditRecord
{
    protected static string $resource = ServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Услуга сохранена';
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        if (!empty($data['image']) && is_string($data['image'])) {
            $data['image'] = [$data['image']];
        }
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (array_key_exists('image', $data)) {
            $data['image'] = is_array($data['image']) ? ($data['image'][0] ?? null) : $data['image'];
        }
        return $data;
    }
}
