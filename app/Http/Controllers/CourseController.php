<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('dashboard', compact('courses'));
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.detail', compact('course'));
    }

    public function purchase($id)
    {
        $user = Session::get('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'You need to login first.');
        }

        $course = Course::findOrFail($id);
        $adminPhone = "628123456789"; // Nomor WhatsApp admin
        return redirect("https://wa.me/$adminPhone?text=I%20want%20to%20purchase%20the%20course%20{$course->title}");
    }

    public function accessCourse($id)
{
    $user = Session::get('user');
    if (!$user) {
        return redirect()->route('login')->with('error', 'Please login first.');
    }

    $course = Course::findOrFail($id);

    // Cek apakah user memiliki akses ke kursus
    if (!$user->courses()->where('course_id', $id)->exists()) {
        return redirect()->route('dashboard')->with('error', 'You do not have access to this course.');
    }

    return view('courses.access', compact('course'));
}

}
