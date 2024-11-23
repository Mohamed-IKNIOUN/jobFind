<?php


use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LandingController::index');

$routes->get('/login', 'User::login');
$routes->post('/login', 'User::loginPost');
$routes->get('/register', 'User::register');
$routes->post('/register', 'User::registerPost');
$routes->get('/logout', 'User::logout');
$routes->get('/contact', 'User::contact');

$routes->get('/jobs', 'Employee::index');
$routes->get('/jobs/apply/(:num)', 'Employee::apply/$1');


$routes->get('/myPosts', 'Employer::myJobs');
$routes->match(['get', 'post'], '/jobs/create', 'Employer::postJob');


// $routes->get('jobs/create', 'JobsController::create');
// $routes->post('jobs/store', 'JobsController::store');
// $routes->get('jobs/show/(:num)', 'JobsController::show/$1');
// $routes->get('jobs/edit/(:num)', 'JobsController::edit/$1');
// $routes->post('jobs/update/(:num)', 'JobsController::update/$1');
// $routes->get('jobs/delete/(:num)', 'JobsController::delete/$1');