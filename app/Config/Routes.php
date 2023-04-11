<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
// $routes->setDefaultController('Home');
// $routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

$routes->get('/', 'Home::index');
$routes->get('test/(:num)', 'Dashboard\Pelicula::test/$10');
$routes->group('dashboard', function($routes){

    // Test user... crear usuario y verficar si coincide con la encriptacion
    // $routes->get('usuario/crear','\App\Controllers\Web\Usuario::create_user');
    // $routes->get('usuario/verifypass', '\App\Controllers\Web\Usuario::probate_pass');

    $routes->presenter('pelicula', ['controller' =>'Dashboard\pelicula']);
    //  $routes->presenter('pelicula');
    $routes->presenter('categoria', ['controller' =>'Dashboard\categoria']);
});

    $routes->get('login','\App\Controllers\Web\Usuario::login', ['as'=>'usuario.login']);
    $routes->post('login_post', '\App\Controllers\Web\Usuario::login_post', ['as'=>'usuario.logins']);

    $routes->get('register','\App\Controllers\Web\Usuario::register', ['as'=>'usuario.register']);
    $routes->post('register_post', '\App\Controllers\Web\Usuario::register_post', ['as'=>'usuario.register_post']);
    $routes->get('logout','\App\Controllers\Web\Usuario::logout', ['as'=>'usuario.logout']);

// $routes->post('/hola-mundo', 'Home::index');
// $routes->put('/hola-mundo', 'Home::index');
// $routes->patch('/hola-mundo', 'Home::index');
// $routes->delete('/hola-mundo', 'Home::index');

// Con este tipo de ruta se pueden crear la ruta de un controlador para un crud interno
// $routes->presenter('home');

// Lo mismo que lo anterior, pero esta es para un API REST y las presenter es solo para archivos que seran internos  
//  $routes->resource('home');

// HTTP get= obtener informacion---- post: --- put: actualizar--- path: actualizar--- delete

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
