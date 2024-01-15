<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Student;
use Illuminate\View\View;
use App\Models\ProgramStudy;

class StudentController extends Controller
{

    public function index(): View
    {
        $students = Student::paginate(5);
        return view('students.index')->with('students', $students);
    }


    public function create(): View
    {
        // $programStudi = [
        //     'Teknik Informatika',
        //     'Rekayasa Perangkat Lunak',
        //     'Sistem Informasi',
        //     'Sains Data',
        //     // Tambahkan program studi lainnya sesuai kebutuhan
        // ];

        $programStudi = ProgramStudy::all();

        return view('students.create', compact('programStudi'));

        // return view('students.create');
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
        // dd($validated['program_study']);
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
        $student = Student::find($id);
        return view('students.edit')->with('students', $student);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $student = Student::find($id);
        $input = $request->all();
        $student->update($input);
        return redirect('student')->with('flash_message', 'student Updated!');
    }


    public function destroy(string $id): RedirectResponse
    {
        Student::destroy($id);
        return redirect('student')->with('flash_message', 'Student deleted!');
    }
}
