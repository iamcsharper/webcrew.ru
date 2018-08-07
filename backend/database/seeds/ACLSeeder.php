<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ACLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        $permissions = [
            'access admin', // admin panel basic access only stats are available
            'admin economics', // admin panel, finances
            'pay teachers',
            'get paid',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $role = Role::create(['name' => 'student']);
        $role->givePermissionTo('pay teachers');

        $role = Role::create(['name' => 'teacher']);
        $role->givePermissionTo('get paid');

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo($permissions);
    }
}
