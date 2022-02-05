<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = (new \App\Models\Role)->where('name', 'Admin')->first();
        $admin = (new \App\Models\User)->create([
           
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('adminadmin'),
            'role_id' => $role->id,
            'remember_token' => Str::random(10),
        ]);
    }
}
