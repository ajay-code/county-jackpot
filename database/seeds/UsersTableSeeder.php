<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Ajay Singh',
            'email' => 'ajay10mar96@gmail.com',
            'password' => bcrypt('123456'),
            'gender' => 'male',
        ]);
    }
}
