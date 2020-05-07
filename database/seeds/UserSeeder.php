<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Model\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
        'name' => 'admin',
        'email' => 'admin@example.com',
        'password' => Hash::make('12345678')
      ])->assignRole('super admin');

      User::create([
        'name' => 'user',
        'email' => 'user@example.com',
        'password' => Hash::make('12345678')
      ])->assignRole('admin');
    }
}
