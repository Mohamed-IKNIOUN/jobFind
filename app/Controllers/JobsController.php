<?php

namespace App\Controllers;

use App\Models\JobModel;

class JobsController extends BaseController
{
    private $jobModel;

    public function __construct()
    {
        $this->jobModel = new JobModel();
    }

    // Display all jobs
    public function index()
    {
        $title = "jobFind | Jobs";
        $data['jobs'] = $this->jobModel->findAll();
        $data['title'] = $title;
        return view('jobs/jobs', $data);
    }
}