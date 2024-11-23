<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'profile';
    protected $primaryKey = 'profile_id';
    protected $allowedFields = [
        'user_id',
        'full_name',
        'date_birth',
        'phone',
        'address',
        'education',
        'experience',
        'skills',
        'profile_picture',
        'updated_at'
    ];
    protected $returnType = 'array';
}
