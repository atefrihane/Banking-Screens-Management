<?php

namespace Database\Seeders;

use App\Modules\Role\Models\Role;
use App\Modules\User\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'superadmin',
        ]);
        User::create([
            'first_name' => 'Bos',
            'last_name' => 'le Progres',
            'email' => 'test@test.tn',
            'password' => bcrypt('123456'),
            'role_id' => 1,
        ]);
    }
}
