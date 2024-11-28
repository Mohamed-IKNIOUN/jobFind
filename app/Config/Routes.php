<?php


use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LandingController::index');

$routes->get('/login', 'User::login', ['filter' => 'guestAuth']);
$routes->post('/login', 'User::loginPost', ['filter' => 'guestAuth']);
$routes->get('/register', 'User::register', ['filter' => 'guestAuth']);
$routes->post('/register', 'User::registerPost', ['filter' => 'guestAuth']);
$routes->get('/logout', 'User::logout');
$routes->get('/contact', 'User::contact');
$routes->get('/Terms', 'User::termsOfUse');
$routes->get('/about', 'User::about');



$routes->get('/jobs', 'Employee::index', ['filter' => 'employeeAuth']);
$routes->get('/jobs/apply/(:num)', 'Employee::apply/$1', ['filter' => 'employeeAuth']);
$routes->get('/jobs/myApplications', 'Employee::applications', ['filter' => 'employeeAuth']);
$routes->get('/jobs/myApplications/delete/(:num)', 'Employee::delete/$1', ['filter' => 'employeeAuth']);


$routes->get('/myPosts', 'Employer::myJobs', ['filter' => 'employerAuth']);
$routes->get('/jobs/create', 'Employer::createJob', ['filter' => 'employerAuth']);
$routes->post('/jobs/create', 'Employer::createJobPost', ['filter' => 'employerAuth']);
$routes->get('/jobs/edit/(:num)', 'Employer::edit/$1', ['filter' => 'employerAuth']);
$routes->post('/jobs/edit', 'Employer::editPost', ['filter' => 'employerAuth']);
$routes->get('/jobs/delete/(:num)', 'Employer::delete/$1', ['filter' => 'employerAuth']);