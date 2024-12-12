<?php


use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Landing page (MAIN PAGE)
$routes->get('/', 'LandingController::index');

// Not signed user
$routes->get('/login', 'User::login', ['filter' => 'guestAuth']);
$routes->post('/login', 'User::loginPost', ['filter' => 'guestAuth']);
$routes->get('/register', 'User::register', ['filter' => 'guestAuth']);
$routes->post('/register', 'User::registerPost', ['filter' => 'guestAuth']);
$routes->get('/logout', 'User::logout');
$routes->get('/contact', 'User::contact');
$routes->get('/Terms', 'User::termsOfUse');
$routes->get('/about', 'User::about');

// -- User --

// --> Forgot password handling
$routes->get('/forget-password', 'User::forgetPassword', ['filter' => 'guestAuth']);
$routes->post('/sendResetLink', 'User::sendResetLink', ['filter' => 'guestAuth']);
$routes->get('/resetPassword/(:segment)', 'User::resetPassword/$1', ['filter' => 'guestAuth']);
$routes->post('/processResetPassword', 'User::processResetPassword', ['filter' => 'guestAuth']);

// --> profile handling
$routes->get('/profile', 'User::profile', ['filter' => 'userLoggedAuth']);
$routes->get('/profile/edit', 'User::profileEdit', ['filter' => 'userLoggedAuth']);
$routes->post('/profile/edit', 'User::editProfilePost', ['filter' => 'userLoggedAuth']);



// -- Employee -- 
$routes->get('/jobs', 'Employee::index', ['filter' => 'employeeAuth']);
$routes->get('/jobs/apply/(:num)', 'Employee::apply/$1', ['filter' => 'employeeAuth']);
$routes->get('/jobs/myApplications', 'Employee::applications', ['filter' => 'employeeAuth']);
$routes->get('/jobs/myApplications/delete/(:num)', 'Employee::delete/$1', ['filter' => 'employeeAuth']);
$routes->get('/jobs/search', 'Employee::search', ['filter' => 'employeeAuth']);



// -- Employer -- 
$routes->get('/myPosts', 'Employer::myJobs', ['filter' => 'employerAuth']);
$routes->get('/jobs/create', 'Employer::createJob', ['filter' => 'employerAuth']);
$routes->post('/jobs/create', 'Employer::createJobPost', ['filter' => 'employerAuth']);
$routes->get('/jobs/edit/(:num)', 'Employer::edit/$1', ['filter' => 'employerAuth']);
$routes->post('/jobs/edit', 'Employer::editPost', ['filter' => 'employerAuth']);
$routes->get('/jobs/delete/(:num)', 'Employer::delete/$1', ['filter' => 'employerAuth']);
$routes->get('post/(:num)/applications', 'Employer::applications/$1', ['filter' => 'employerAuth']);
$routes->get('post/application/(:num)', 'Employer::applicationDetails/$1', ['filter' => 'employerAuth']);
$routes->post('/application/edit', 'Employer::updateApplicationStatus', ['filter' => 'employerAuth']);

// generate a resume as pdf
$routes->get('/application/download-pdf/(:num)', 'Employer::downloadPDF/$1', ['filter' => 'employerAuth']);
