<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userTeacherEmail = 'collin@ski.sch.id';
        $userStudentEmail = 'andi@ski.sch.id';

        //User Teacher
        User::updateOrCreate(
            ['email' => $userTeacherEmail],
            [
                'name' => 'Collin',
                'password' => bcrypt('password'),
                'role' => 'teacher',
            ]
        );

        //User Student
        User::updateOrCreate(
            ['email' => $userStudentEmail],
            [
                'name' => 'Andi',
                'password' => bcrypt('password'),
                'role' => 'student',
            ]
        );
    }
}
