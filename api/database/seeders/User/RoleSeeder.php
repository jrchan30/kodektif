<?php

namespace Database\Seeders\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin', 'member'];
        $users = User::all();
        foreach ($roles as $role) {
            Role::create(
                ['name' => $role]
            );
        }

        $roles = Role::pluck('id')->toArray();
        foreach ($users as $user) {
            $random = array_rand($roles, 1);
            $user->roles()->sync([$roles[$random]]);
        }
    }
}
