<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Md Super Admin',
            'email' => 'superadmin@gmail.com',
            'username' => 'superAdmin',
            'status' => 1,
            'email_verified_at' => now(),
            'password' => bcrypt(123456), // 123456
            'remember_token' => Str::random(10),
        ]);
        User::factory()->count(50)->create();
    }
}
