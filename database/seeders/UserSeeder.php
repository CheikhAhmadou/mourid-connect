<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(50)->create()->each(function (User $user) {
            $user->assignRole('vendor');
        });
    }
}
