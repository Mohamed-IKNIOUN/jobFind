<?php

namespace App\Controllers;

use App\Models\JobModel;

class Employer extends BaseController
{
    private $jobModel;
    function myJobs()
    {

        $this->jobModel = new JobModel();

        $jobs = $this->jobModel->where('employer_id', session()->get('user_id'))->findAll();
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
}