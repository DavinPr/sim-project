<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Person;
use App\User;
use App\Student;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Insert personal data
        DB::table('people')->insert([
            'id' => '1',
            'person_name' => 'Admin',
            'person_birthdate' => '2000-10-10',
            'person_birthplace' => 'Sillicon Valley',
            'person_gender' => 'Laki-laki'
        ]);

        DB::table('users')->insert([
            'person_id' => '1',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'is_admin' => 1
        ]);
    }
}
