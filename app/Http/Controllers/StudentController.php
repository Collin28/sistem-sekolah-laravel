<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
     public function index()
    {
        $title ='Sistem Sekolah - Daftar Siswa' ;
        $students = [
            [
                'id'=> 1,
                'nis'=> '1001',
                'name'=> 'andi',
                'class'=> '12 TKj 2',
                'major' => 'TKJ'
            ],

             [
                'id'=> 2,
                'nis'=> '1002',
                'name'=> 'collin',
                'class'=> '12 TKj 2',
                'major' => 'TKJ'
            ]
        ];
        return view('students.index', [
            'title'=> $title,
            'students'=> $students
        ]);
    }

    public function show(string $id)    
    {
        $title = 'Sistem Sekolah - Detail Siswa';

        return view('students.show',[
            'title'=>$title,
        ]);
    }

    public function create()
    {   
        $title = 'Sistem Sekolah - Tambah Siswa';

        return view('students.create',[
            'title'=>$title
        ]);
    }

     public function edit()    
    {
        $title = 'Sistem Sekolah - Edit Siswa';

        return view('students.edit',[
            'title'=>$title
        ]);
    }

     public function store()    
    {
        return "Melakukan penambahan data siswa";
    }

     public function update()    
    {
        return "Melakukan perubahan data siswa";
    }

     public function destroy(string $id)    
    {
        return "Menghapus data siswa";
    }

}
