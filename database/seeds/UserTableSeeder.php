<?php

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
        DB::statement("truncate table tb_user");
        DB::table('tb_user')->insert([
            'nama' => 'Admin',
            'username' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'user_akses' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
