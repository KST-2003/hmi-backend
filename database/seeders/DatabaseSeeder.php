<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
         
        ]);
        User::create(
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role_id' => 1,
                'password' => Hash::make('aaaaaa'),
                'cpassword' => Hash::make('aaaaaa')
            ]
            );
       
        // \App\Models\User::factory(10)->create();

       
    
    }
}
