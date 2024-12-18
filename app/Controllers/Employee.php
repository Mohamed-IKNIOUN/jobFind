<?php

namespace App\Controllers;

use App\Models\JobModel;
use App\Models\ApplicationsModel;

class Employee extends BaseController
{

    private $jobModel;
    public function __construct()
    {
        $this->jobModel = new JobModel();
    }
    function index()
    {
        $title = "jobFind | Jobs";
        $data['jobs'] = $this->jobModel->getJobsWithApplications();
        $data['title'] = $title;

        return view('employee/jobs', $data);
    }

    //apply for job
    public function apply($jobId)
    {

        $userId = session()->get('user_id');

        // Check if the user has already applied for this job
        $applicationModel = new ApplicationsModel();
        $existingApplication = $applicationModel
            ->where('job_id', $jobId)
            ->where('employee_id', $userId)
            ->first();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'You have already applied for this job.');
        }

        // Insert the application into the database
        $data = [
            'job_id' => $jobId,
            'employee_id' => $userId,
            'status' => 'pending', // Default status
        ];

        if ($applicationModel->insert($data)) {
            return redirect()->back()->with('success', 'Application submitted successfully!');
        }

        return redirect()->back()->with('error', 'Failed to apply for the job. Please try again.');
    }

    // Show details of a single job
    public function show($id)
    {
        $data['job'] = $this->jobModel->find($id);
        return view('jobs/show', $data);
    }

    // see my applications
    public function applications()
    {
        $employeeId = session()->get('user_id');
        $title = "My applications";
        $data['jobs'] = $this->jobModel->getJobsAppliedByEmployee($employeeId);
        $data['title'] = $title;

        return view('employee/applications', $data);
    }

    // remove application
    public function delete($id)
    {

        $applicationModel = new ApplicationsModel();
        $applicationModel->delete($id);

        return redirect()->to('/jobs/myApplications')->with('success', 'Application removed successfully!');
    }

    //search for jobs
    public function search()
    {

        $keyword = $this->request->getGet('keywords');

        if (!$keyword) {
            return redirect()->with('error', 'Enter a keyword');
        }

        $jobModel = new JobModel();

        $jobs = $jobModel->select('jobs.*, users.username as employer_username, COUNT(applications.application_id) as applications_count')
            ->join('users', 'users.id = jobs.employer_id', 'left')
            ->join('applications', 'applications.job_id = jobs.job_id', 'left')
            ->groupBy('jobs.job_id') // Group by job to count applications
            ->like('jobs.title', $keyword)
            ->orLike('jobs.location', $keyword)
            ->orLike('jobs.description', $keyword)
            ->findAll();


        $data = [
            'title' => 'Search results',
            'jobs'  => $jobs,
            'keyword' => $keyword
        ];



        return view('employee/search_results', $data);
    }
}
