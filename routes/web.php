<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Events\MessageSent;
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

Route::get('/', function () {
    //return view('dashboard');
    return view('pruebapusher');
});

Route::view('/pusher', 'pusher');


Route::post('/send-message', function (\Illuminate\http\Request $request){
    \Illuminate\Support\Facades\Log::info("ENTRA EN WEH");
   $message = $request->message;
   $name = $request->name;
   event(new MessageSent("pepe", "holaa pepe"));
   return response()->json(['status' => 'success']);
});

/*Route::get('/', function () {
    //return view('dashboard');
    return view('pruebapusher');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/users', [ProfileController::class, 'vistaUsuario']);

Route::get('/game', [ProfileController::class, 'vistaGame']);



Route::get('/chat', [ProfileController::class, 'showChat'])->name('chat.show');
Route::post('/chat/message', [ProfileController::class, 'mensajeRecibido']);





require __DIR__.'/auth.php';
