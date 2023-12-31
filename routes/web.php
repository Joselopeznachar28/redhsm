<?php

use App\Http\Controllers\CDDController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\PortController;
use App\Http\Controllers\ResponseIncidenceController;
use App\Http\Controllers\TorreController;
use App\Http\Controllers\ZabbixController;
use App\Http\Controllers\IncidenceController;
use App\Http\Controllers\UserController;
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

Route::get('ZabbixApi', [ZabbixController::class, 'index'])->name('zabbix.index');
Route::get('ProblemsZabbix/{id}', [ZabbixController::class, 'problems'])->name('zabbix.problems');

//Users
Route::get('Users', [UserController::class, 'index'])->name('users.index');
Route::get('User/Create', [UserController::class, 'create'])->name('users.create');
Route::post('User/Created', [UserController::class, 'store'])->name('users.store');
Route::get('User/{user:name}/Edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('User/{user:name}/Edited', [UserController::class, 'update'])->name('users.update');
Route::delete('User/{user:name}/Destroyed', [UserController::class, 'destroy'])->name('users.destroy');

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

//ResponseIncidences
Route::get('Response/Incidences', [ResponseIncidenceController::class, 'index'])->name('responses.index');
Route::get('Create/ResponseToIncidences/{device:name}', [ResponseIncidenceController::class, 'create'])->name('responses.create');
Route::post('Response/Created', [ResponseIncidenceController::class, 'store'])->name('responses.store');
Route::get('Edit/Response/{response:response}', [ResponseIncidenceController::class, 'edit'])->name('responses.edit');
Route::put('Response/{response:response}/Edited', [ResponseIncidenceController::class, 'update'])->name('responses.update');
Route::delete('Response/{response:response}/Destroyed', [ResponseIncidenceController::class, 'destroy'])->name('responses.destroy');
Route::get('ResponseChangeStatusDone', [ResponseIncidenceController::class, 'done'])->name('responses.done');

//Incidences
Route::get('Incidences', [IncidenceController::class, 'index'])->name('incidences.index');
Route::get('Create/Incidence', [IncidenceController::class, 'create'])->name('incidences.create');
Route::post('Incidence/Created', [IncidenceController::class, 'store'])->name('incidences.store');
Route::get('Edit/Incidence/{incidence:incidence}', [IncidenceController::class, 'edit'])->name('incidences.edit');
Route::put('Incidence/{incidence:incidence}/Edited', [IncidenceController::class, 'update'])->name('incidences.update');
Route::delete('Incidence/{incidence:incidence}/Destroyed', [IncidenceController::class, 'destroy'])->name('incidences.destroy');

