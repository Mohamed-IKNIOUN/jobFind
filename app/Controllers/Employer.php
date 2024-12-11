<?php

namespace App\Controllers;

use App\Models\ApplicationsModel;
use App\Models\JobModel;
use App\Models\ProfileModel;
use App\Models\UserModel;

// for the pdf generating
use Dompdf\Dompdf;



class Employer extends BaseController
{
    private $jobModel;
    function myJobs()
    {

        $this->jobModel = new JobModel();

        // $jobs = $this->jobModel->where('employer_id', session()->get('user_id'))->findAll();

        $jobs = $this->jobModel->getEmployerJobsWithApplications();

        $data = [
            'jobs' => $jobs,
            'title' => 'My posts',
        ];

        return view('employer/myJobs', $data);
    }

    public function createJob()
    {
        $title = 'Post a job';
        $data = ['title' => $title];

        return view('employer/post_job', $data);
    }

    public function createJobPost()
    {

        $jobModel = new JobModel();

        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        $location = $this->request->getPost('location');
        $salary = $this->request->getPost('salary');
        $userId = session()->get('user_id');

        if (!$title || !$description || !$location || !$salary) {
            return redirect()->to('/jobs/create')->withInput()->with('error', 'All fields are required');
        }

        $data = [
            'title'       => $title,
            'description' => $description,
            'location'    => $location,
            'salary'      => $salary,
            'employer_id' => $userId,
        ];


        if ($jobModel->insert($data)) {
            return redirect()->to('/myPosts')->with('success', 'Job posted successfully!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to post the job. Please try again.');
        }
    }

    public function edit($id)
    {

        $jobModel  = new JobModel();

        $data['job'] = $jobModel->find($id);
        $data['title'] = 'Update';
        return view('employer/edit_job', $data);
    }

    public function editPost()
    {
        $jobModel = new JobModel();

        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        $location = $this->request->getPost('location');
        $salary = $this->request->getPost('salary');
        $id = $this->request->getPost('job_id');


        if (!$title || !$description || !$location || !$salary) {
            return redirect()->to('/jobs/edit/' . $id)->withInput()->with('error', 'All fields are required');
        }

        $data = [
            'title' => $title,
            'description' => $description,
            'location' => $location,
            'salary' => $salary,
        ];

        $jobModel->update($id, $data);
        return redirect()->to('/myPosts')->with('success', 'Job edited successfully !');
    }

    public function delete($id)
    {
        $jobModel = new JobModel();
        $jobModel->delete($id);
        return redirect()->to('/myPosts')->with('success', 'Job deleted successfully !');
    }

    public function applications($jobId)
    {

        $applicationbModel = new ApplicationsModel();

        $applications = $applicationbModel->getApplicationsOfJob($jobId);

        $data = [
            'applications' => $applications,
            'title' => 'post | applications',
        ];

        return view('employer/job_applications', $data);
    }

    public function applicationDetails($applicationId)
    {

        $applicationbModel = new ApplicationsModel();

        $details = $applicationbModel->getApplicationDetails($applicationId);

        $data = [
            'details' => $details,
            'title' => 'application | details'
        ];

        return view('employer/application_info', $data);
    }

    public function updateApplicationStatus()
    {

        $status = $this->request->getPost('status');
        $applicationId = $this->request->getPost('application_id');

        if (!$status || !$applicationId) {
            return redirect()->back()->with('error', 'Invalid application ID or status!');
        }

        $applicationModel = new ApplicationsModel();

        $application = $applicationModel->find($applicationId);
        if (!$application) {
            return redirect()->back()->with('error', 'Application not found!');
        }

        $data = [
            'status' => $status
        ];

        $applicationModel->update($applicationId, $data);
        return redirect()->back()->with('success', 'Application edited successfully !');
    }

    public function downloadPDF($employee_id)
    {

        $userModel = new UserModel();

        $profileModel = new ProfileModel();

        $profile = $profileModel->where('user_id', $employee_id)->first();
        $employer = $userModel->where('id', session()->get('user_id'))->first();

        $data = [
            'title' => 'Resume PDF',
            'employeeProfile' => $profile,
            'employerInfos' => $employer
        ];


        // $options = new Options();
        // $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf();


        $html = view('employer/resume_sample', $data);

        // Load the HTML into Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation (e.g., 'A4', 'portrait')
        $dompdf->setPaper('A4', 'portrait');

        // Render the PDF
        $dompdf->render();

        $dompdf->stream('Resume');

        // Download the generated PDF
        // return $this->response->setContentType('application/pdf')
        //     ->setBody($dompdf->output())
        //     ->download('Resume.pdf');
    }
}
