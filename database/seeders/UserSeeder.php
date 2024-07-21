<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Enums\Roles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{

    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        $users = $this->dummy();

        foreach ($users as $user) {
            User::create($user);
        }
    }

    private function dummy()
    {
        return  [
            [
                'name' => 'Admin',
                'username' => 'admin',
                'password' => '12345678',
                'role_id' => Role::where('name', Roles::Admin)->first()->id,
                'version_id' => 1,
                'level_assigned_at' => now(),

            ],
            [
                'name' => 'Ali',
                'username' => 'user',
                'password' => '12345678',
                'role_id' => Role::where('name', Roles::User)->first()->id,
                'version_id' => 1,
                'level_assigned_at' => now(),
            ],
            [
                'name' => 'Hidden User',
                'username' => 'user2',
                'password' => '12345678',
                'role_id' => Role::where('name', Roles::HiddenUser)->first()->id,
                'version_id' => 1,
                'level_assigned_at' => now(),
            ],
            [
                'name' => 'Ahmad',
                'username' => 'user3',
                'password' => '12345678',
                'role_id' => Role::where('name', Roles::User)->first()->id,
                'version_id' => 1,
                'level_assigned_at' => now(),
            ],
            [
                'name' => 'Osama',
                'username' => 'user4',
                'password' => '12345678',
                'role_id' => Role::where('name', Roles::User)->first()->id,
                'version_id' => 1,
                'level_assigned_at' => now(),
            ],
        ];
    }
}
