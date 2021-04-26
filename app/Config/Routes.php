<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Cargue primero el archivo de enrutamiento del sistema, de modo que la aplicación y el MEDIO AMBIENTE
// puede anular según sea
if (file_exists(SYSTEMPATH . 'Config/Routes.php')){
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->get('/inicio', 'Inicio::index',['filter' => 'auth']);
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Obtenemos un aumento de rendimiento al especificar el valor predeterminado
//ruta ya que no tenemos que escanear directorios
$routes->get('/', 'Inicio::index',['filter' => 'auth']);
$routes->get('/inicio', 'Inicio::index',['filter' => 'auth']);

// Ruta para usuarios
$routes->get('usuario', 'Usuario::index',['filter' => 'auth']);	
$routes->get('usuario/index', 'Usuario::index',['filter' => 'auth']);	
$routes->post('usuario/crear', 'Usuario::crear',['filter' => 'auth']);

//RUTA PRODUCTOS PRODUCTOS
$routes->get('productos', 'Productos::index',['filter' => 'auth']);		
$routes->post('productos/crear', 'Productos::crear',['filter' => 'auth']);
$routes->get("productos/editar/(:any)", "Productos::editar/$1");  
// $routes->group("roles", ["namespace" => "App\Controllers", "filter" => "auth"], function($routes){

// });


/*
 * --------------------------------------------------------------------
 * Enrutamiento adicional
 * --------------------------------------------------------------------
 *
 *
	A menudo habrá ocasiones en las que necesitará enrutamiento adicional y
 * lo necesita para poder anular los valores predeterminados en este archivo. Ambiente
 * rutas basadas es uno de esos momentos. require () archivos de ruta adicionales aquí
 * para que eso suceda.
 *
 * Tendrá acceso al objeto $route dentro de ese archivo sin
 * necesidad de recargarlo.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
