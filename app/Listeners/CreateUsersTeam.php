<?php

namespace App\Listeners;

use App\Models\Role;
use App\Models\User;
use Filament\Events\Auth\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateUsersTeam
{
    public function __construct()
    {
        //
    }

    public function handle(Registered $event): void
    {
        /** @var User $user */
        $user = $event->getUser();

        $role = Role::where('name', 'team admin')->first();

        $team = $user->ownedTeam()->create(['name' => $user->name . ' Team']);

        $user->update([
            'role_id' => $role->id,
            'team_id' => $team->id,
        ]);
    }
}
