<?php

namespace App\Controllers;

use App\Models\JobModel;

class Employer extends BaseController
{
    private $jobModel;
    function myJobs()
    {
        return view('employer/myJobs');
    }










    public function createJob()
    {
        $title = 'Post a job';
        $data = ['title' => $title];
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
            return redirect()->to('/employer/post_job')->with('success', 'Job posted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to post the job. Please try again.');
        }
    }









    public function edit($id)
    {
        $data['job'] = $this->jobModel->find($id);
        return view('jobs/edit', $data);
    }








    public function update($id)
    {
        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'location' => $this->request->getPost('location'),
            'salary' => $this->request->getPost('salary'),
        ];

        $this->jobModel->update($id, $data);
        return redirect()->to('/jobs');
    }









    public function delete($id)
    {
        $this->jobModel->delete($id);
        return redirect()->to('/jobs');
    }
}
