<?php

use App\Http\Controllers;
use App\Models\Attachment;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard', [
        'posts' => auth()->user()->posts()->latest()->get(),
    ]);
})->middleware(['auth'])->name('dashboard');

Route::post('attachments', function () {
    request()->validate([
        'attachment' => ['required', 'file'],
    ]);

    $attachment = Attachment::create([
        'record' => auth()->user(),
    ]);

    $media = $attachment->addMedia(request()->file('attachment'))
        ->toMediaCollection();

    return [
        'attachable_sgid' => $attachment->richTextSgid(),
        'image_url' => $media->getFullUrl(),
    ];
})->middleware(['auth'])->name('attachments.store');

Route::resource('posts', Controllers\PostController::class);

require __DIR__.'/auth.php';
