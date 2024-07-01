<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Models\Role;
use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->mutateFormDataUsing(function (array $data) {
                    $role = Role::where('name', 'user')->first();

                    $data['role_id'] = $role->id;
                    $data['team_id'] = auth()->user()->team_id;

                    return $data;
                }),
        ];
    }
}
