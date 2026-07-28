<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\SchoolClass\IndexController;
use App\Http\Controllers\SchoolClass\ShowController;
use App\Http\Controllers\SchoolClass\CreateController;
use App\Http\Controllers\SchoolClass\EditController;
use App\Http\Controllers\SchoolClass\StoreController;
use App\Http\Controllers\SchoolClass\UpdateController;
use App\Http\Controllers\SchoolClass\DestroyController;



use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//student data management 
Route::name('students.')->prefix('students')->group(function () {

    //show student list page
    Route::get('/', [StudentController::class, 'index'])->name('index');

    //show student detail page
    Route::get('/{id}', [StudentController::class, 'show'])->name('show');

    //add student page
    Route::get('/create', [StudentController::class, 'create'])->name('create');

    //edit student page
    Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('edit');

    //add student logic
    Route::post('/', [StudentController::class, 'store'])->name('store');

    //edit data student logic
    Route::put('/{id}', [StudentController::class, 'update'])->name('update');

    //delete data student logic
    Route::delete('/', [StudentController::class, 'destroy'])->name('destroy');

});

//Teachers data management
Route::name('teachers.')->prefix('teacher')->group(function() {
    
    //show student list page
    Route::get('/', [TeacherController::class, 'index'])->name('index');

    //show teacher detail page
    Route::get('/', [TeacherController::class, 'show'])->name('show');

    //add teacher page
    Route::get('/create', [TeacherController::class, 'create'])->name('create');

    //edit teacher page
    Route::get('/{id}/edit', [TeacherController::class, 'edit'])->name('edit');

    //add teacher logic
    Route::post('/', [TeacherController::class, 'store'])->name('store');

    //edit teacher logic
    Route::put('/{id}', [TeacherController::class, 'update'])->name('update');

    //delete teacher logic
    Route::delete   ('/', [TeacherController::class, 'destroy'])->name('destroy');
});

//school class management
Route::name('classes.')->prefix('classes')->group(function(){
    
    //show school class list page
    Route::get('/', IndexController::class)->name('index');

    //show school class detail page
    Route::get('/', ShowController::class)->name('show');

    //add school class page
    Route::get('/create', CreateController::class)->name('create');

    //edit school class page
    Route::get('/{id}/edit', EditController::class)->name('edit');

    //add school class logic
    Route::post('/', StoreController::class)->name('store');

    //edit school class logic
    Route::put('/{id}', UpdateController::class)->name('update');

    //delete school class logic
    Route::delete   ('/', DestroyController::class)->name('destroy');
});

    //Majors management
    Route::resource('majors', MajorController::class);