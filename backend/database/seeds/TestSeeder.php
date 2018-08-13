<?php

use App\EducationalClass;
use App\User;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder {
    public function run() {
        $student = User::create([
            'name' => 'Test student',
            'email' => 'ilyha19@live.ru',
            'password' => Hash::make('1q2w3e'),
            'verified' => 1,
        ]);

        $student->assignRole('student');
        $student->save();

        $teacher = User::create([
            'name' => 'Test teacher',
            'email' => 'ilyhaa19@gmail.com',
            'password' => Hash::make('1q2w3e'),
            'verified' => 1,
        ]);

        $teacher->assignRole('teacher');
        $teacher->save();

        $testClass = EducationalClass::create([
            'name' => 'Test',
            'price' => 190,
            'max_places' => 10,
            'teacher_id' => $teacher->id
        ]);

        $student->student_classes()->save($testClass);
    }
}