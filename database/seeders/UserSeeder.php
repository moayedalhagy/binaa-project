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
                'role_id' => Role::where('name', Roles::Admin)->first()->id

            ],
            [
                'name' => 'User',
                'username' => 'user',
                'password' => '12345678',
                'role_id' => Role::where('name', Roles::User)->first()->id
            ],
            [
                'name' => 'Hidden User',
                'username' => 'user2',
                'password' => '12345678',
                'role_id' => Role::where('name', Roles::HiddenUser)->first()->id
            ],
        ];
    }
}
