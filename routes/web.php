<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//})->name('home');
Route::get('/', \App\Livewire\Public\Pages\Home::class)->name('home');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/upload-image', function (Request $request) {
        $fileName = $request->file('upload')->store('projects', 'public');
        $url = \Illuminate\Support\Facades\Storage::url($fileName);
        return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
    })->name('upload.image');

    Route::get('projects', \App\Livewire\Dashboard\Projects\Index::class)->name('projects');
});
