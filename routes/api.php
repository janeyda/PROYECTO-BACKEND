<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/fuerte', function (Request $request) {
    return json_encode ([ 'msg'=>'porque']);
});

Route::apiResource('usuarios',UsuarioController::class);
Route::apiResource('perfiles',PerfilController::class);
Route::apiResource('roles',RolController::class);
Route::get('perfiles', [PerfilController::class, 'index']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'login']);
//Route::put('usuarios',UsuarioController::class,'update');//
Route::put('roles/{id}', [RolController::class, 'update']);
Route::get('/test-password', function () {
    $usuario = Usuario::where('email', 'correo@ejemplo.com')->first();
    $passwordCorrecta = Hash::check('contraseña', $usuario->password);
    return response()->json(['passwordCorrecta' => $passwordCorrecta]);
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/usuario', [UsuarioController::class, 'show']);
    Route::put('/usuario', [UsuarioController::class, 'update']);
});
