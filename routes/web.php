<?php

use App\Http\Controllers\CDDController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\PortController;
use App\Http\Controllers\TorreController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//torres
Route::get('Torres', [TorreController::class, 'index'])->name('torres.index');
Route::get('CrearTorre', [TorreController::class, 'create'])->name('torres.create');
Route::post('TorreCreada', [TorreController::class, 'store'])->name('torres.store');
Route::get('Editar/Torre/{id}', [TorreController::class, 'edit'])->name('torres.edit');
Route::put('Torre/{id}/Editada', [TorreController::class, 'update'])->name('torres.update');
Route::delete('Torre/{id}/Eliminada', [TorreController::class, 'destroy'])->name('torres.destroy');

//pisos
Route::get('Pisos', [FloorController::class, 'index'])->name('floors.index');
Route::get('CrearPiso/Torre/{torre}', [FloorController::class, 'create'])->name('floors.create');
Route::post('PisoCreado', [FloorController::class, 'store'])->name('floors.store');
Route::get('Editar/Piso/{id}', [FloorController::class, 'edit'])->name('floors.edit');
Route::put('Piso/{id}/Editado', [FloorController::class, 'update'])->name('floors.update');
Route::delete('Piso/{id}/Eliminado', [FloorController::class, 'destroy'])->name('floors.destroy');

//cuartos de datos
Route::get('CuartosDeDatos', [CDDController::class, 'index'])->name('cdds.index');
Route::get('Crear/CuartodeDatos/{torre:name}/{floor:name}', [CDDController::class, 'create'])->name('cdds.create');
Route::post('CuartoDeDatosCreado', [CDDController::class, 'store'])->name('cdds.store');
Route::get('Editar/CuartoDeDatos/{id}', [CDDController::class, 'edit'])->name('cdds.edit');
Route::put('CuartoDeDatos/{id}/Editado', [CDDController::class, 'update'])->name('cdds.update');
Route::delete('CuardoDeDatos/{id}/Eliminado', [CDDController::class, 'destroy'])->name('cdds.destroy');

//Dispositivos
Route::get('Dispotivos', [DeviceController::class, 'index'])->name('devices.index');
Route::get('Crear/Dispotivo/{cdd:name}', [DeviceController::class, 'create'])->name('devices.create');
Route::post('DispositivoCreado', [DeviceController::class, 'store'])->name('devices.store');
Route::get('Editar/Dispositivo/{id}', [DeviceController::class, 'edit'])->name('devices.edit');
Route::put('Dispositivo/{id}/Editado', [DeviceController::class, 'update'])->name('devices.update');
Route::delete('Dispositivo/{id}/Eliminado', [DeviceController::class, 'destroy'])->name('devices.destroy');
Route::get('Dispositivo/{device:name}', [DeviceController::class, 'show'])->name('devices.show');

//Puertos
Route::get('Puertos', [PortController::class, 'index'])->name('ports.index');
Route::get('Crear/Puertos/{device}', [PortController::class, 'create'])->name('ports.create');
Route::post('PuertoCreado', [PortController::class, 'store'])->name('ports.store');
Route::get('Editar/Puerto/{id}', [PortController::class, 'edit'])->name('ports.edit');
Route::put('Puerto/{id}/Editado', [PortController::class, 'update'])->name('ports.update');
Route::delete('Puerto/{id}/Eliminado', [PortController::class, 'destroy'])->name('ports.destroy');


