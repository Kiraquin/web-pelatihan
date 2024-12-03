<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    // Validasi untuk memastikan akses hanya oleh admin
    private function authorizeAdmin()
{
    $user = session('user'); // Ambil data user dari session
    if (!$user || !$user->is_admin) {
        abort(403, 'Unauthorized action.');
    }
}


    // Tampilkan form registrasi admin
    public function showRegisterForm()
    {
        $this->authorizeAdmin();
        return view('admin.register');
    }

    // Proses registrasi admin atau user biasa
    public function register(Request $request)
    {
        $this->authorizeAdmin();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'is_admin' => 'required|boolean',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin,
        ]);

        return redirect()->route('admin.register')->with('success', 'User baru berhasil didaftarkan.');
    }

    public function manageUsers()
    {
        $this->authorizeAdmin();

        $users = User::all();
        return view('admin.manage-users', compact('users'));
    }

    public function updateRole(Request $request, $id)
    {
        $this->authorizeAdmin();

        $request->validate(['is_admin' => 'required|boolean']);

        $user = User::findOrFail($id);
        $user->is_admin = $request->is_admin;
        $user->save();

        return redirect()->route('admin.users')->with('success', 'User role updated successfully.');
    }

    public function deleteUser($id)
    {
        $this->authorizeAdmin();

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    public function giveAccess(Request $request)
    {
        $this->authorizeAdmin();

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $user = User::findOrFail($request->user_id);
        $course = Course::findOrFail($request->course_id);

        if ($user->courses()->where('course_id', $course->id)->exists()) {
            return back()->with('error', 'User already has access to this course.');
        }

        $user->courses()->attach($course->id);

        return back()->with('success', 'Access granted successfully!');
    }

    public function showAccessForm()
    {
        $this->authorizeAdmin();

        $users = User::all();
        $courses = Course::all();

        return view('admin.access-course', compact('users', 'courses'));
    }

    public function showCreateCourseForm()
    {
        $this->authorizeAdmin();

        return view('admin.create-course');
    }

    public function storeCourse(Request $request)
    {
        $this->authorizeAdmin();

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Course successfully created.');
    }

    public function deleteCourse($id)
    {
        $this->authorizeAdmin();

        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Course successfully deleted.');
    }

    public function dashboard()
    {
        $this->authorizeAdmin();

        $courses = Course::all();
        return view('admin.dashboard', compact('courses'));
    }

    public function manageCourses()
    {
        $this->authorizeAdmin();

        $courses = Course::all();
        return view('admin.manage-courses', compact('courses'));
    }
}
