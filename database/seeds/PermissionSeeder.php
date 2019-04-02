<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'users']);
        $permission = Permission::create(['name' => 'manage users']);

        $role->givePermissionTo($permission);
        $permission->assignRole($role);

        /** @var \App\Models\User $user */
        $user = \App\Models\User::create([
                'name' => 'Admin',
                'email' => 'admin@domain.com',
                'password' => \Illuminate\Support\Facades\Hash::make('123456789'),
        ]);

        $user->syncRoles($role);

    }
}



