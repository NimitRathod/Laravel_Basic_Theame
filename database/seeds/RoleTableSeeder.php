<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
           'super-admin',
           'admin'
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        $role = Role::where('name','super-admin')->first();

        foreach (Permission::get() as $permission) {
            DB::table('role_has_permissions')->insert([
                'permission_id' => $permission->id,
                'role_id' => $role->id,
            ]);
        }

    }
}
