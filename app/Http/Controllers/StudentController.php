<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\View\View;
use App\Models\ProgramStudy;

class StudentController extends Controller
{

    public function index(): View
    {
        $students = Student::all();
        return view('students.index')->with('students', $students);
    }


    public function create(): View
    {
        $programStudi = ProgramStudy::all();

        return view('students.create', compact('programStudi'));
    }


    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nim' => 'required',
            'name' => 'required',
            'email' => 'required|email|string',
            'address' => 'required',
            'program_study' => 'required',
            'mobile' => 'required|numeric',
        ]);

        $input = $request->all();

        Student::create([
            'nim' => $validated['nim'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'address' => $validated['address'],
            'prodi_id' => $validated['program_study'],
            'mobile' => $validated['mobile']
        ]);
        return redirect('student')->with('flash_message', 'Student Addedd!');
    }

    public function show(string $id): View
    {
        $student = Student::find($id);
        return view('students.show')->with('students', $student);
    }

    public function edit(string $id): View
    {
        $programStudi = ProgramStudy::all();

        $student = Student::find($id);

        return view('students.edit', compact('programStudi'))->with('students', $student);
    }

    public function update(Request $request, Student $student): RedirectResponse
    {
        $input = $request->all();
        
        $student->update([
            'nim' => $input['nim'],
            'name' => $input['name'],
            'email' => $input['email'],
            'address' => $input['address'],
            'prodi_id' => $input['program_study'],
            'mobile' => $input['mobile']
        ]);
        

        return redirect('student')->with('flash_message', 'student Updated!');
    }


    public function destroy(string $id): RedirectResponse
    {
        Student::destroy($id);
        return redirect('student')->with('flash_message', 'Student deleted!');
    }
}
