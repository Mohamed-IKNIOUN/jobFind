<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class employeeAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('isLogged')) {
            return redirect()->back()->with('error', 'You must be logged in to access this page');
        } else if (session()->get('user_type') != 'employee') {
            return redirect()->back()->with('error', 'Acces denied : You must be an employee to access this page');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}