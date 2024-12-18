<?php

namespace App\Models;

use CodeIgniter\Model;

class JobModel extends Model
{
    protected $table = 'jobs';
    protected $primaryKey = 'job_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'employer_id',
        'title',
        'description',
        'location',
        'salary',
        'posted_date',
        'created_at',
        'updated_at'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';


    public function getEmployerJobsWithApplications()
    {
        return $this->select('jobs.job_id, jobs.title, jobs.description, jobs.salary, jobs.posted_date, jobs.location, COUNT(applications.application_id) as applications_count, jobs.updated_at, jobs.created_at')
            ->join('applications', 'applications.job_id = jobs.job_id', 'left')
            ->join('users', 'users.id = jobs.employer_id', 'inner')
            ->where('employer_id', session()->get('user_id'))
            ->groupBy('jobs.job_id')
            ->findAll();
    }


    public function getJobsWithApplications()
    {
        return $this->select('jobs.job_id, jobs.title, jobs.description, jobs.salary, jobs.created_at, jobs.location, COUNT(applications.application_id) as applications_count, users.username AS employer_username')
            ->join('applications', 'applications.job_id = jobs.job_id', 'left')
            ->join('users', 'users.id = jobs.employer_id', 'inner')
            ->groupBy('jobs.job_id')
            ->findAll();
    }

    public function getJobsAppliedByEmployee($employeeId)
    {
        return $this->select('jobs.job_id, jobs.title, jobs.description, jobs.salary, jobs.created_at, jobs.location, applications.application_id, applications.status, applications.date_application, users.username AS employer_username')
            ->join('applications', 'applications.job_id = jobs.job_id', 'inner')
            ->join('users', 'users.id = jobs.employer_id', 'inner')
            ->where('applications.employee_id', $employeeId)
            ->findAll();
    }

    // public function getApplicationsOfJob($jobId)
    // {
    //     return $this->select('users.id, users.username, applications.date_application, applications.status')
    //         ->join('applications', 'users.id = applications.employee_id', 'inner')
    //         ->where('applications.job_id', $jobId)
    //         ->findAll();
    // }


}
