<?php
  
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemperatuurController;
# routes\web.php
 
Auth::routes();

Route::get('/', [TemperatuurController::class, 'index']);   
                        // ROUTER 
Route::get('overzicht', [TemperatuurController::class, 'detail'])->middleware('auth'); ;

Route::get('contact', [TemperatuurController::class, 'contact']);

Route::post('nieuwsbrief', [TemperatuurController::class, 'nieuwsbrief']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
