<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $clientRole = Role::firstOrCreate(['name' => 'Client']);
        
        User::factory()->count(100)->create()->each(function ($user) use ($adminRole, $clientRole, $faker) {
            $role = $faker->boolean ? $adminRole : $clientRole;
            $user->roles()->attach($role->id);
        });
    }
}
