<?php

namespace Database\Seeders;

use App\Models\Collaborator;
use App\Models\Student;
use Illuminate\Database\Seeder;

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
        // $collaborator = Collaborator::find(2);
        // $collaborator->email_verified_at = '2021-02-01T13:00:01';
        // $collaborator->save();
        $student = Student::find(3);
        $student->email_verified_at = '2021-02-01T13:00:01';
        $student->save();
    }
}
