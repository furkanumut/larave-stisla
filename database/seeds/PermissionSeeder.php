<?php

use Illuminate\Database\Seeder;
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
      Permission::create(['name' => 'see_dashboard'])->assignRole('super admin');
      Permission::create(['name' => 'see_users'])->assignRole('super admin');
      Permission::create(['name' => 'see_user'])->assignRole('super admin');
      Permission::create(['name' => 'delete_user'])->assignRole('super admin');
      Permission::create(['name' => 'edit_user'])->assignRole('super admin');
      Permission::create(['name' => 'add_user'])->assignRole('super admin');
      Permission::create(['name' => 'see_roles'])->assignRole('super admin');
      Permission::create(['name' => 'add_role'])->assignRole('super admin');
      Permission::create(['name' => 'delete_role'])->assignRole('super admin');
      Permission::create(['name' => 'edit_role'])->assignRole('super admin');
      Permission::create(['name' => 'see_role_permissions'])->assignRole('super admin');
      Permission::create(['name' => 'manage_role_permissions'])->assignRole('super admin');
    }
  }
