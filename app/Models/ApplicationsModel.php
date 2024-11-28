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
        'created_at',
        'updated_at'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
}