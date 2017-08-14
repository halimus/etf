<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        //DB::table('users')->delete(); //delete all records
        //App\Models\User::truncate();
        
        for ($i = 0; $i < 5; $i++) {
            
            $username = str_random(6);
        
            DB::table('users')->insert([
                'username' => $username,
                'email' => strtolower($username . '@domain.com'),
                'password' => bcrypt('1234'),
                //'created_at' => date('Y-m-d H:i:s')
                //'created_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
            ]);
            
        }
 
    }

}
