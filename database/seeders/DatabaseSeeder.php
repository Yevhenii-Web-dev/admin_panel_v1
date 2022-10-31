<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'first_name' => 'AdminUser',
            'last_name' => 'AdminUser',
            'email' => 'admin.admin@example.com',
            'password' => bcrypt('Pa$$w0rd!'),
            'is_admin' => true,
        ]);

        User::factory()->create([
            'first_name' => 'UserUser',
            'last_name' => 'UserUser',
            'email' => 'user.user@example.com',
            'password' => bcrypt('Pa$$w0rdUser!'),

        ]);
    }
}
