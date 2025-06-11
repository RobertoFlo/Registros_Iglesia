<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Api\DepartamentoController;
use App\Http\Controllers\Api\Municipiocontroller;
use App\Http\Controllers\Api\DistritoController;
use App\Http\Controllers\Api\Personacontroller;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Bautizocontroller;
use App\Http\Controllers\Api\Confirmacontroller;
use App\Http\Controllers\Api\Finanzascontroller;
use App\Http\Controllers\Api\Bodacontroller;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\VerifyEmailController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::post('/login-app',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);

// Route::view('/email/verified', 'verifyEmail')->name('email.verified');
// Route::post('/login', function () {
//    //return redirect()->route('email.verified');
//       return response()->json(['message' => 'Correo verificado con éxito']);
// })->name('login');


// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//         // dd($request);
//         $request->fulfill();

//         return redirect('/email/verified');
//          //return redirect()->route('email.verified');
//          // return response()->json(['message' => 'Correo verificado con éxito']);
// })->middleware(['auth', 'signed'])->name('verification.verify');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json($request->user());
});


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);
    // Route::get('/email/verify', function () {
    //     //return view('/email/verified');
    //     return redirect('/email/verified');
    // })->middleware('auth')->name('verification.notice');

    // Route::post('/email/verification-notification', function (Request $request) {
    //     $request->user()->sendEmailVerificationNotification();
    //     return back()->with('message', 'Verification link sent!');
    // })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

    Orion::resource('departamentos', DepartamentoController::class);
    Orion::resource('municipios', Municipiocontroller::class);
    Orion::resource('distritos', DistritoController::class);
    Orion::resource('persona', Personacontroller::class);
    Orion::resource('bautizo', Bautizocontroller::class);
    Orion::resource('confirma', Confirmacontroller::class);
    Orion::resource('finanza', Finanzascontroller::class);
    Orion::resource('matrimonio', Bodacontroller::class);
});


Route::get('/permissions', [RoleController::class, 'listPermissions'])->middleware('auth:sanctum');
Route::post('/roles', [RoleController::class, 'store'])->middleware('auth:sanctum');
