<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(): View
    {
        $students = Student::with([
            'studyProgram',
            'profile',
            'courses',
        ])->get();

        return view('students.index', compact('students'));
    }
}