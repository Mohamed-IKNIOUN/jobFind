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

    public function getJobsWithApplications()
    {
        return $this->select('jobs.job_id, jobs.title, jobs.description, jobs.salary, jobs.posted_date, jobs.location, COUNT(applications.application_id) as applications_count')
            ->join('applications', 'applications.job_id = jobs.job_id', 'left')
            ->groupBy('jobs.job_id')
            ->findAll();
    }
}
