<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcademicPortalSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('course_student')->truncate();
        DB::table('profiles')->truncate();
        DB::table('students')->truncate();
        DB::table('courses')->truncate();
        DB::table('study_programs')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Program Studi
        $programId = DB::table('study_programs')->insertGetId([
            'name' => 'Informatika',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Mata Kuliah
        $courseId = DB::table('courses')->insertGetId([
            'code' => 'PW001',
            'name' => 'Pengembangan Web',
            'semester' => 'Semester 1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Data Mahasiswa
        $students = [
            ['nim' => 'IK2511005', 'name' => 'Susan Ristina'],
            ['nim' => 'IK2511037', 'name' => 'Alda Miranda'],
            ['nim' => 'IK2511038', 'name' => 'Sitti Anizya Azila Baso'],
            ['nim' => 'IK2511024', 'name' => 'Tasya'],
            ['nim' => 'IK2511004', 'name' => 'Marsya'],
        ];

        foreach ($students as $student) {
            $studentId = DB::table('students')->insertGetId([
                'nim' => $student['nim'],
                'name' => $student['name'],
                'study_program_id' => $programId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('course_student')->insert([
                'student_id' => $studentId,
                'course_id' => $courseId,
                'enrolled_at' => now()->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
