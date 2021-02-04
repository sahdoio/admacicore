<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->delete();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@rodrigoreasom.com',
            'password'=> bcrypt('admin123'),
            'level' => 1
        ]);

        User::create([
            'name' => 'Editor',
            'email' => 'editor@rodrigoreasom.com',
            'password'=> bcrypt('editor123'),
            'level' => 2
        ]);
    }
}
