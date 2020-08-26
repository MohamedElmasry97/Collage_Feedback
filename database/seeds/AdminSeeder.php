<?php

use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0;$i < 100;$i++) {
            Student::create([
                'name' => Str::random(8),
                'email' => Str::random(12) . '@mail.com',
                'password' => Hash::make('123123123'),
                'phone' => random_int(11111111111, 99999999999),
                'department_name' => 'Cs']);
        }
    }
}
