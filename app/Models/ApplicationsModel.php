<?php

namespace App\Models;

use CodeIgniter\Model;

class ApplicationsModel extends Model
{
    protected $table = 'applications';
    protected $primaryKey = 'application_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    // protected $useSoftDeletes = true;
    protected $allowedFields = [
        'job_id',
        'employee_id',
        'date_application',
        'status',
        'created_at',
        'updated_at'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';


    public function getApplicationsOfJob($jobId)
    {
        return $this->select('users.id, users.username, applications.date_application, applications.status, applications.application_id')
            ->join('users', 'users.id = applications.employee_id', 'inner')
            ->where('applications.job_id', $jobId)
            ->findAll();
    }

    public function getApplicationDetails($applicationId)
    {
        return $this
            ->select(
                'users.id, users.username,
            applications.date_application, applications.status, applications.application_id,
            profile.*
            '
            )
            ->join('users', 'users.id = applications.employee_id')
            ->join('profile', 'users.id = profile.user_id')
            ->where('application_id', $applicationId)
            ->first();
    }
}
