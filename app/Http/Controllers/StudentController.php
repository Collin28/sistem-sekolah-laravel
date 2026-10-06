<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $title = 'Sistem Sekolah - Daftar Siswa';

        $students = Student::select(['id', 'nis', 'name', 'class', 'major'])->get();

        return view('students.index', [
            'title' => $title,
            'students' => $students
        ]);
    }

    public function show(Student $student)
    {
        $title = 'Sistem Sekolah - Detail Siswa';

        return view('students.show', [
            'title' => $title,
            'student' => $student
        ]);
    }

    public function create()
    {
        $title = 'Sistem Sekolah - Tambah Siswa';

        return view('students.create', [
            'title' => $title
        ]);
    }

    public function edit(Student $student)
    {
        $title = 'Sistem Sekolah - Edit Siswa';

        return view('students.edit', [
            'title' => $title,
            'student' => $student

        ]);
    }

    public function store(StoreRequest $request)
    {
        //Validasi
        $validatedRequest = $request->validated();

        //Tambahkan ke database
        Student::create($validatedRequest);

        //Handle if success
        return redirect()->route('students.index');

    }

    public function update(Student $student, UpdateRequest $request)
    {
        //Validasi
        $validatedRequest = $request->validate([
            'nis' => ['required', 'string', 'size:4', 'unique:students,nis,' . $student->id],
            'name' => ['required', 'string'],
            'gender' => ['required', 'string', 'in:Laki-laki,Perempuan'],
            'major' => ['required', 'string', 'in:AKL,TKJ,BID'],
            'class' => ['required', 'string']
        ]);

        //Update data
        $student->update($validatedRequest);

        return redirect()->route('students.index');

    }

    public function destroy(Student $student)
    {
        //delete data
        $student->delete();

        // handle if success
        return redirect()->route('students.index');


    }

}
