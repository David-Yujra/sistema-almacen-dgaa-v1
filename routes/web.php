<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/MostrarMarca', 'ListaDesplegableController@ListarMarcaProducto');
Route::get('/MostrarContenido', 'ListaDesplegableController@ListarContenidoProducto');
Route::get('/MostrarColor', 'ListaDesplegableController@ListarColorProducto');
Route::get('/MostrarMedida', 'ListaDesplegableController@ListarMedidaProducto');
Route::get('/MostrarTipoItem', 'ListaDesplegableController@ListarTipoItemProducto');
// Route::get('/MostrarItem', 'ListaDesplegableController@ListarItemProducto');

Route::get('/MostrarNuevoTwo', 'PruebaController@ListarItem');
Route::get('/MostrarNuevo', 'PruebaController@ListarTipoItemProducto');


Route::get('/mostrarItem', 'ItemController@Mostrar');

Route::get('/listarProveedor', 'ProveedorController@index');
Route::post('/guardarProveedor', 'ProveedorController@store');
Route::post('/mostrarProveedor', 'ProveedorController@show');
Route::post('/editarProveedor', 'ProveedorController@update');

Route::post('/GuardarMarca', 'ListaDesplegableController@GuardarListaMarcaProducto');
Route::post('/GuardarContenido', 'ListaDesplegableController@GuardarListaContenidoProducto');
Route::post('/GuardarColor', 'ListaDesplegableController@GuardarListaColorProducto');
Route::post('/GuardarMedida', 'ListaDesplegableController@GuardarListaMedidaProducto');
Route::post('/GuardarTipoItem', 'ListaDesplegableController@GuardarListaTipoItemProducto');

Route::post('/guardarItem', 'ItemController@Guardar');

Route::post('/mostrarDatoMarca', 'ListaDesplegableController@ListarDatosMarca');
Route::post('/editarMarca', 'ListaDesplegableController@EditarListaMarca');
Route::post('/mostrarDatoContenido', 'ListaDesplegableController@ListarDatosContenido');
Route::post('/editarContenido', 'ListaDesplegableController@EditarListaContenido');
Route::post('/mostrarDatoColor', 'ListaDesplegableController@ListarDatosColor');
Route::post('/editarColor', 'ListaDesplegableController@EditarListaColor');
Route::post('/mostrarDatoMedida', 'ListaDesplegableController@ListarDatosMedida');
Route::post('/editarMedida', 'ListaDesplegableController@EditarListaMedida');
Route::post('/mostrarDatoTipoItem', 'ListaDesplegableController@ListarDatosTipoItem');
Route::post('/editarTipoItem', 'ListaDesplegableController@EditarListaTipoItem');

Route::post('/CambiarEstadoMarca','ListaDesplegableController@CambioEstadoMarca');
Route::post('/CambiarEstadoContenido','ListaDesplegableController@CambioEstadoContenido');
Route::post('/CambiarEstadoColor','ListaDesplegableController@CambioEstadoColor');
Route::post('/CambiarEstadoMedida','ListaDesplegableController@CambioEstadoMedida');
Route::post('/cambiarEstadoTipoItem','ListaDesplegableController@CambioEstadoTipoItem');

Route::get('/anidados', 'TipoItemController@store');
Route::get('/anidadosObtener', 'TipoItemController@ObtenerDatos');




// Route::post('/GuardarTipoItem', 'ListaDesplegableController@GuardarListaTipoItem');
// Route::post('/GuardarItem', 'ListaDesplegableController@GuardarListaItem');

// Route::post('/GuardarItemTerminado', 'ListaDesplegableController@GuardarListaItemTerminado');

// Route::get('/', function () {
//     return view('plantilla.app');
// });

//Auth::routes();

Route::get('/{optional?}', function(){
    return view('plantilla.app');

})->name('basepath')
->where('optional', '.*');