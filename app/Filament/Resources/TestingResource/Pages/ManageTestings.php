<?php

namespace App\Filament\Resources\TestingResource\Pages;

use App\Filament\Resources\TestingResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTestings extends ManageRecords
{
    protected static string $resource = TestingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ActionGroup::make([
                Actions\CreateAction::make(),
            ])
        ];
    }
}
