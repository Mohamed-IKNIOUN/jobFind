<?php

namespace App\Controllers;



class LandingController extends BaseController
{
    function index()
    {
        if (session()->has('user_id')) {
            if (session()->get('user_type') == 'employee') {
                return redirect()->to('/jobs');
            } elseif (session()->get('user_type') == 'employer') {
                return redirect()->to('/myPosts');
            }
        }

        $data = [
            'title' => "Find a job"
        ];

        return view("landingPage", $data);
    }
}
